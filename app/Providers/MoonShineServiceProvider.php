<?php

namespace App\Providers;

use App\Models\Country;
use App\MoonShine\Resources\AmenitieResource;
use App\MoonShine\Resources\CountryResource;
use App\MoonShine\Resources\CurrencyResource;
use App\MoonShine\Resources\PropertyTypeResource;
use Illuminate\Support\ServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app(MoonShine::class)->menu([
            MenuItem::make('Пользователи', new MoonShineUserResource()),
            MenuItem::make('Роли', new MoonShineUserRoleResource()),
            MenuItem::make('Удобства', new AmenitieResource()),
            MenuItem::make('Страна', new CountryResource()),
            MenuItem::make('Валюта', new CurrencyResource()),
            MenuItem::make('Тип недвижимости', new PropertyTypeResource()),
        ]);
    }
}
