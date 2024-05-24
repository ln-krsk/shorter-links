<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Link extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function setLinkParameter(array $data): array
    {
        // get the parameters from the url
        $givenParameters = parse_url($data['url'], PHP_URL_QUERY);
        // internal field that collects parameter from user input
        $parameter = '';

        // if parameters are supplied in url
        if ($givenParameters !== null) {
            // adding to parameter field (pre-fixed with ?)
            $parameter = '?'.$givenParameters;
            // delete the parameters from the url field
            $data['url'] = strtok($data['url'], '?');
        }

        // Define the UTM parameters
        $utmKeys = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_id', 'utm_name', 'utm_term', 'utm_content'];

        // Loop through each UTM parameter and concatenate them to the parameter field
        foreach ($utmKeys as $key) {
            if (! empty($data[$key])) {
                $parameter .= empty($parameter) ? '?' : '&';
                $parameter .= $key.'='.$data[$key];
            }
        }

        // adding individual parameters if they exist
        if (! empty($data['individual_param'])) {
            $parameter .= empty($parameter) ? '?' : '&';
            $parameter .= $data['individual_param'];
        }

        // Remove the UTM keys and individual parameters from the data array, because they do not belong to the model
        $data = array_diff_key($data, array_flip($utmKeys));
        unset($data['individual_param']);

        // set parameter field in data array
        $data['parameter'] = $parameter;

        return $data;
    }

    public static function getLinkParameter(array $data): array
    {
        $parameter = $data['parameter'] ?? '';

        // Parse the parameter string and extract the values for each field
        parse_str(parse_url($parameter, PHP_URL_QUERY), $params);

        // Define the UTM parameters
        $utmKeys = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_id', 'utm_name', 'utm_term', 'utm_content'];

        // Loop through each UTM parameter
        foreach ($utmKeys as $key) {
            if (isset($params[$key])) {
                $data[$key] = $params[$key];
                unset($params[$key]);
            }
        }

        // Handle individual_param if it has a value
        if (! empty($params)) {
            $params = http_build_query($params);
            $data['individual_param'] = $params;
        }

        return $data;
    }

    public function assembledShortUrl(): string
    {
        return $this->domain.'/'.$this->short_link;
    }

    public function getStatus(): string
    {
        if (! empty($this->active_from) || (! empty($this->expires_at))) {
            $now = now();

            if ($this->active_from > $now) {
                return 'upcoming';
            }

            if ($this->expires_at < $now) {
                return 'expired';
            }
        }

        return 'active';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }

    public function requests(): HasMany
    {
        return $this->hasMany(RequestAnalytics::class, 'request_id');
    }
}
