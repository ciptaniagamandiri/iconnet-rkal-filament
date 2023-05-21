<?php

namespace App\Providers;

use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\ContactResource;
use App\Filament\Resources\CarouselResource;
use App\Filament\Resources\PostResource;
use App\Filament\Resources\ProductResource;
use App\Filament\Resources\FormregistrationResource;
use App\Filament\Resources\TestimonyResource;
use App\Filament\Resources\SocialMediaResource;
use App\Filament\Resources\UserResource;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::navigation(function (NavigationBuilder $builder): NavigationBuilder {
            return $builder->groups([
                NavigationGroup::make('')
                    ->collapsible(false)
                    ->items([
                        NavigationItem::make('Dashboard')
                            ->icon('heroicon-o-home')
                            ->activeIcon('heroicon-s-home')
                            ->isActiveWhen(fn (): bool => request()->routeIs('filament.pages.dashboard'))
                            ->url(route('filament.pages.dashboard')),
                        NavigationItem::make('Show Website')
                            ->url('/', shouldOpenInNewTab: true)
                            ->icon('heroicon-o-external-link')
                    ]),
                NavigationGroup::make('Blogs')
                    ->collapsible(false)
                    ->items([
                        ...CarouselResource::getNavigationItems(),
                        ...PostResource::getNavigationItems(),
                        ...CategoryResource::getNavigationItems(),
                    ]),
                NavigationGroup::make('')
                    ->collapsible(false)
                    ->items([
                        ...ProductResource::getNavigationItems(),
                        ...FormregistrationResource::getNavigationItems(),
                        ...TestimonyResource::getNavigationItems(),
                    ]),
                NavigationGroup::make('Settings')
                    ->collapsible(false)
                    ->items([
                        ...SocialMediaResource::getNavigationItems(),
                    ]),
                NavigationGroup::make('')
                    ->collapsible(false)
                    ->items([
                        ...ContactResource::getNavigationItems(),
                        ...UserResource::getNavigationItems(),
                    ])
            ]);
        });

        Filament::serving(function () {
            // Using Vite
            Filament::registerViteTheme('resources/css/filament.css');
        });
    }
}
