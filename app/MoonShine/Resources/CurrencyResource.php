<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Currency;

use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class CurrencyResource extends Resource
{
	public static string $model = Currency::class;

	public static string $title = 'Валюта';

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Text::make('Название валюты', 'currency_name'),
            Text::make('Код страны', 'currency_code'),
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
