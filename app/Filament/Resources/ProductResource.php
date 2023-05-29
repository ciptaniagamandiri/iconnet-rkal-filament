<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-wifi';

    protected static ?string $navigationLabel = 'Paket Internet & Add On';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        FileUpload::make('thumbnail')
                            ->directory('products')
                            ->required(),
                        TextInput::make('price')
                            ->numeric()
                            ->required(),
                        Select::make('type')
                            ->options([
                                1 => 'Paket Internet',
                                2 => 'Add On'
                            ])
                            ->default(1)
                            ->disablePlaceholderSelection()
                    ]),
                Card::make()
                    ->schema([
                        RichEditor::make('desc')
                            ->required()
                            ->columnSpan(2)
                            ->maxLength(65535),
                    ]),
                Toggle::make('status')
                    ->label('Is Published')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')->circular(),
                TextColumn::make('name'),
                TextColumn::make('price'),
                TextColumn::make('type')->enum([
                    1 => 'Paket Internet',
                    2 => 'Add On'
                ]),
                TextColumn::make('status')
                    ->label('Is Published')->enum([
                    0 => 'Draft',
                    1 => 'Published',
                ]),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d-m-Y H:m:s'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
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
