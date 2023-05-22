<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AreaResource\Pages;
use App\Filament\Resources\AreaResource\RelationManagers;
use App\Models\Coverage\Area;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
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

class AreaResource extends Resource
{
    protected static ?string $model = Area::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Area';

    
    public static function form(Form $form): Form
    {
        $province = Province::whereIn('id', [61,62,63,64,65])->get()->pluck('id');
        $regency = Regency::whereIn('province_id', $province)->get()->pluck('id');
        $district = District::whereIn('regency_id', $regency)->get()->pluck('id');
        return $form
            ->schema([
                Select::make('province_id')
                    ->label('Province')
                    ->options(Province::whereIn('id', [61,62,63,64,65])
                        ->get()
                        ->pluck('name', 'id'))
                    ->searchable(),
                Select::make('regency_id')
                    ->label('City')
                    ->options(Regency::whereIn('province_id', $province)
                        ->get()
                        ->pluck('name', 'id'))
                    ->searchable(),
                Select::make('district_id')
                    ->label('District')
                    ->options(District::whereIn('regency_id',$regency)
                        ->get()
                        ->pluck('name', 'id'))
                    ->searchable(),
                Select::make('village_id')
                    ->label('Village')
                    ->options(Village::whereIn('district_id',$district)
                        ->get()
                        ->pluck('name', 'id'))
                    ->searchable(),
                TextInput::make('name')
                    ->label('Area')
                    ->required()
                    ->maxLength(255),
                Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('province.name'),
                TextColumn::make('regency.name'),
                TextColumn::make('district.name'),
                TextColumn::make('village.name'),
                TextColumn::make('name'),
                IconColumn::make('status')
                    ->boolean(),
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
            'index' => Pages\ListAreas::route('/'),
            'create' => Pages\CreateArea::route('/create'),
            'edit' => Pages\EditArea::route('/{record}/edit'),
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
