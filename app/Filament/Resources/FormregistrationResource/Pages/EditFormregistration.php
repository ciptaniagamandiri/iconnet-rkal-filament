<?php

namespace App\Filament\Resources\FormregistrationResource\Pages;

use App\Filament\Resources\FormregistrationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFormregistration extends EditRecord
{
    protected static string $resource = FormregistrationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
