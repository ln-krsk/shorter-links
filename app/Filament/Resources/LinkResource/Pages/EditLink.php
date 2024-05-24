<?php

namespace App\Filament\Resources\LinkResource\Pages;

use App\Filament\Resources\LinkResource;
use App\Models\Link;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLink extends EditRecord
{
    protected static string $resource = LinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['url'] = 'https://'.$data['url'];
        $data['campaign_id'] = $this->record->campaign_id;
        unset($data['customer_id']);

        return Link::setLinkParameter($data);
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['customer_id'] = $this->record->campaign->customer_id;

        // Remove 'http://' or 'https://' from the beginning of the URL
        $data['url'] = preg_replace('(^https?://)', '', $data['url']);

        // Remove a question mark at the end of the URL if there is one
        $data['url'] = preg_replace('(\\?$)', '', $data['url']);

        return Link::getLinkParameter($data);
    }
}
