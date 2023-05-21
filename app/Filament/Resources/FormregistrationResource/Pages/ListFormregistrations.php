<?php

namespace App\Filament\Resources\FormregistrationResource\Pages;

use App\Filament\Resources\FormregistrationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFormregistrations extends ListRecords
{
    protected static string $resource = FormregistrationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
