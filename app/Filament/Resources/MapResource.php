<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MapResource\Pages;
use App\Filament\Resources\MapResource\RelationManagers;
use App\Models\Coverage\Map;
use App\Models\Province;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MapResource extends Resource
{
    protected static ?string $model = Map::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationLabel = 'Map';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Map Title')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('file')
                    ->label('Map File')
                    ->directory('files')
                    ->required(),
                Select::make('type')
                    ->options([
                        'Select Status' => 'Select Status',
                        'Pulau Kalimantan' => 'Pulau Kalimantan',
                        'Provinsi' => 'Provinsi',
                    ])
                    ->disablePlaceholderSelection()
                    ->required(),
                Select::make('province_id')
                    ->label('Province')
                    ->options(Province::whereIn('id', [61,62,63,64,65])
                        ->get()
                        ->pluck('name', 'id'))
                    ->searchable(),
                Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                ImageColumn::make('file'),
                TextColumn::make('type'),
                TextColumn::make('province.name'),
                IconColumn::make('status')
                    ->boolean(),
                TextColumn::make('deleted_at')
                    ->dateTime(),
                TextColumn::make('created_at')
                    ->dateTime(),
                TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
                ForceDeleteBulkAction::make(),
                RestoreBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaps::route('/'),
            'create' => Pages\CreateMap::route('/create'),
            'edit' => Pages\EditMap::route('/{record}/edit'),
        ];
    }    
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
