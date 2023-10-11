<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\SwitchBoolean;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class PropertyResource extends Resource
{
	public static string $model = Property::class;

	public static string $title = 'Объекты';

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            BelongsTo::make('Пользователь', 'user', 'name'),
            BelongsTo::make('Тип объекта', 'propertyType', 'type_name'),
            Text::make('Заголовок', 'title'),
            Number::make('Комнаты', 'rooms')->min(1),
            Textarea::make('Описание', 'description'),
            Textarea::make('Комментарий риэлтора', 'realtor_comment'),
            Number::make('Цена', 'price'),
            BelongsTo::make('Валюта', 'currency', 'currency_name'),
            BelongsTo::make('Страна', 'country', 'country_name'),
            BelongsTo::make('Город', 'city', 'city_name'),
            Textarea::make('Адрес', 'address'),
            Text::make('Широта', 'gps_latitude'),
            Text::make('Долгота', 'gps_longitude'),
            SwitchBoolean::make('Опубликовать', 'is_published')
                ->onValue(1) // Активное значение элемента формы
                ->offValue(0), // Неактивное значение элемента формы
            Image::make('Фото', 'photos')
                ->dir('/') // Директория где будут хранится файлы в storage (по умолчанию /)
                ->disk('public') // Filesystems disk
                ->allowedExtensions(['jpg', 'gif', 'png']) // Допустимые расширения
                ->multiple()
                ->removable(),
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
