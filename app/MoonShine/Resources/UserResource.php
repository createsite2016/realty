<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\Password;
use MoonShine\Fields\SwitchBoolean;
use MoonShine\Fields\Text;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class UserResource extends Resource
{
	public static string $model = User::class;

	public static string $title = 'Пользователи';

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Text::make('Имя', 'name'),
            Text::make('Email', 'email'),
            Text::make('Телеграмм ID', 'telegram_id'),
            Text::make('Номер телефона', 'phone_number'),
            Text::make('API токен', 'api_token'),
            SwitchBoolean::make('Активность', 'is_active')
                ->onValue(1) // Активное значение элемента формы
                ->offValue(0), // Неактивное значение элемента формы
            Password::make('Пароль', 'password'),
            BelongsTo::make('Роль', 'role', 'role_name'),
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
