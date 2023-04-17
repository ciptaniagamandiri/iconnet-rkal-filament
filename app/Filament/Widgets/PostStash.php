<?php

namespace App\Filament\Widgets;

use App\Models\Blog\Post;
use App\Models\Contact;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class PostStash extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Berita', Post::count()),
            Card::make('Pesan', Contact::count()),
            Card::make('User', User::count()),
        ];
    }
}
