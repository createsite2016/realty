<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\City;

use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\HasOne;
use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class CityResource extends Resource
{
	public static string $model = City::class;

	public static string $title = 'Город';

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Text::make('Название города', 'city_name'),
            BelongsTo::make('Страна', 'country', 'country_name'),
        ];
	}

	public function rules(Model $item): array
	{
	    return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
