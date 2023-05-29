<?php

namespace App\Filament\Widgets;

use App\Models\Formregistration;
use App\Models\Product;
use App\Models\Blog\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class PostStash extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Form Register', Formregistration::count()),
            Card::make('Paket Internet & Add On', Product::count()),
            Card::make('Promo', Post::count()),
        ];
    }
}
