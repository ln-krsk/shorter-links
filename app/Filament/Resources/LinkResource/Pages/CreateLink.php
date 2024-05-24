<?php

namespace App\Filament\Resources\LinkResource\Pages;

use App\Filament\Resources\LinkResource;
use App\Models\Link;
use Filament\Resources\Pages\CreateRecord;

class CreateLink extends CreateRecord
{
    protected static string $resource = LinkResource::class;
    protected static ?string $title = 'Erstelle einen neuen Short Link';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data = Link::setLinkParameter($data);
        $data['created_by'] = auth()->user()->id;
        unset($data['customer_id']);

        if (! str_starts_with($data['url'], 'https://') && ! str_starts_with($data['url'], 'http://')) {
            $data['url'] = 'https://'.$data['url'];
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
