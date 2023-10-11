<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Favourite;

use MoonShine\Fields\BelongsTo;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class FavouriteResource extends Resource
{
	public static string $model = Favourite::class;

	public static string $title = 'Избранное';

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            BelongsTo::make('Пользователь', 'user', 'name'),
            BelongsTo::make('Объект', 'property', 'title'),
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
