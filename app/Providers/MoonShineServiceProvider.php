<?php

namespace App\Providers;

use App\Models\Country;
use App\MoonShine\Resources\AmenitieResource;
use App\MoonShine\Resources\CityResource;
use App\MoonShine\Resources\CountryResource;
use App\MoonShine\Resources\CurrencyResource;
use App\MoonShine\Resources\FavouriteResource;
use App\MoonShine\Resources\PropertyResource;
use App\MoonShine\Resources\PropertyTypeResource;

use  MoonShine\MoonShineRequest as Request;
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
            MenuItem::make('Пользователи', new MoonShineUserResource())->canSee(function(Request $request) {
                return $request->user('moonshine')?->moonshine_user_role_id === 1;
            }),
            MenuItem::make('Роли', new MoonShineUserRoleResource())->canSee(function(Request $request) {
                return $request->user('moonshine')?->moonshine_user_role_id === 1;
            }),
            MenuItem::make('Удобства', new AmenitieResource())->canSee(function(Request $request) {
                return $request->user('moonshine')?->moonshine_user_role_id === 1;
            }),
            MenuItem::make('Страна', new CountryResource())->canSee(function(Request $request) {
                return $request->user('moonshine')?->moonshine_user_role_id === 1;
            }),
            MenuItem::make('Валюта', new CurrencyResource())->canSee(function(Request $request) {
                return $request->user('moonshine')?->moonshine_user_role_id === 1;
            }),
            MenuItem::make('Тип недвижимости', new PropertyTypeResource())->canSee(function(Request $request) {
                return $request->user('moonshine')?->moonshine_user_role_id === 1;
            }),
            MenuItem::make('Города', new CityResource())->canSee(function(Request $request) {
                return $request->user('moonshine')?->moonshine_user_role_id === 1;
            }),
            MenuItem::make('Объекты', new PropertyResource()),
            MenuItem::make('Избранное', new FavouriteResource())->canSee(function(Request $request) {
                return $request->user('moonshine')?->moonshine_user_role_id === 1;
            }),
        ]);
    }
}
