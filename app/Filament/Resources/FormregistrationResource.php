<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormregistrationResource\Pages;
use App\Filament\Resources\FormregistrationResource\RelationManagers;
use App\Models\Formregistration;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class FormregistrationResource extends Resource
{
    protected static ?string $model = Formregistration::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Lengkap (Sesuai KTP)')
                    ->required()
                    ->maxLength(255),
                TextInput::make('telp')
                    ->label('NO HP (Diutamakan terintegrasi WA)')
                    ->required()
                    ->maxLength(13),
                TextInput::make('idcustomer')
                    ->label('ID Pelanggan PLN')
                    ->required()
                    ->maxLength(20),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('coordinate')
                    ->label('Titik Koordinat')
                    ->required()
                    ->maxLength(255),
                Select::make('product_id')
                    ->label('Paket Internet')
                    ->options(Product::where('status', true)
                        ->get()
                        ->pluck('price', 'id'))
                    ->searchable()
                    ->required(),
                TextInput::make('nik')
                    ->label('NIK KTP')
                    ->required()
                    ->maxLength(16),
                RichEditor::make('address')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(65535),
                Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('address'),
                TextColumn::make('telp'),
                TextColumn::make('idcustomer'),
                TextColumn::make('email'),
                TextColumn::make('coordinate'),
                TextColumn::make('product.price'),
                TextColumn::make('nik'),
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
                ExportBulkAction::make(),
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
            'index' => Pages\ListFormregistrations::route('/'),
            'create' => Pages\CreateFormregistration::route('/create'),
            'edit' => Pages\EditFormregistration::route('/{record}/edit'),
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
