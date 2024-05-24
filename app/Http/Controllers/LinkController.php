<?php

/** @noinspection ALL */

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\RequestAnalytics;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function redirect(string $url, Request $request)
    {
        // Retrieve the link record associated with the short link identifier
        $shortURL = Link::where('short_link', $url)->firstOrFail();

        // Check if the short URL is active and not expired
        if ($shortURL->active_from || $shortURL->expires_at) {
            if ($shortURL->active_from > now() || $shortURL->expires_at < now()) {
                $fallback = Str::startsWith($shortURL->fallback, 'https://') ? $shortURL->fallback : 'https://'.$shortURL->fallback;

                return redirect($fallback);
            }
        }

        $this->storeRequestData($shortURL, $request);

        // Increment the redirect count
        ++$shortURL->redirect_count;
        $shortURL->save();

        // get tracking parameters and add to the target URL
        $params = $shortURL->parameter;
        $targetURL = $shortURL->url.$params;

        return redirect()->away($targetURL);
    }

    protected function storeRequestData(Link $shortURL, Request $request)
    {
        // Extract relevant request headers
        $requestHeaders = $request->header();

        // List of headers containing personal data
        $headersToRemove = ['cookie', 'authorization', 'x-forwarded-for', 'x-real-ip'];

        // Remove header info that may contain personal data
        foreach ($headersToRemove as $header) {
            if (isset($requestHeaders[$header])) {
                unset($requestHeaders[$header]);
            }
        }

        // Serialize request headers to JSON
        $jsonData = json_encode($requestHeaders);

        // Store in the database
        RequestAnalytics::create([
            'link_id' => $shortURL->id,
            'request_data' => $jsonData,
        ]);
    }
}
