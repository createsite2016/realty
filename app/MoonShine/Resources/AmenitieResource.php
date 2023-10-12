<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Amenitie;

use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class AmenitieResource extends Resource
{
	public static string $model = Amenitie::class;

	public static string $title = 'Удобства';

    public string $titleField = 'amenity_name';

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Text::make('Название удобства', 'amenity_name'),
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
