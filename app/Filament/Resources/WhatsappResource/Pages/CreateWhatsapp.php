<?php

namespace App\Filament\Resources\WhatsappResource\Pages;

use App\Filament\Resources\WhatsappResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWhatsapp extends CreateRecord
{
    protected static string $resource = WhatsappResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
