<?php

namespace App\Filament\Widgets;

use App\Models\Blog\Post;
use Closure;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LastPosts extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Post::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            ImageColumn::make('thumbnail')
                ->label('')
                ->circular(),
            TextColumn::make('title'),
            TextColumn::make('category.name'),
            TextColumn::make('created_at'),
        ];
    }
}
