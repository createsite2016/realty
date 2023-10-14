<?php

namespace App\Http\Requests\Property;

use Illuminate\Foundation\Http\FormRequest;

class PropertyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|min:1',
            'property_type_id' => 'required|integer',
            'title' => 'required|string',
            'rooms' => 'integer',
            'description' => 'string',
            'realtor_comment' => 'string',
            'price' => 'required|integer',
            'currency_id' => 'required|integer',
            'country_id' => 'required|integer',
            'city_id' => 'required|integer',
            'address' => 'required|string',
            'gps_latitude' => 'decimal:2,6',
            'gps_longitude' => 'decimal:2,6',
            'is_published' => 'integer',
            'photos' => 'array',
            'amenities' => 'array',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'user_id обязательное поле',
            'property_type_id.required' => 'property_type_id обязательное поле',
            'title.required' => 'title обязательное поле',
            'price.required' => 'price обязательное поле',
            'currency_id.required' => 'currency_id обязательное поле',
            'country_id.required' => 'country_id обязательное поле',
            'city_id.required' => 'city_id обязательное поле',
            'address.required' => 'address обязательное поле',
            'user_id.integer' => 'user_id должен быть числом',
            'price.integer' => 'price должен быть числом',
            'property_type_id.integer' => 'property_type_id должен быть числом',
            'rooms.integer' => 'rooms должен быть числом',
            'currency_id.integer' => 'currency_id должен быть числом',
            'country_id.integer' => 'country_id должен быть числом',
            'city_id.integer' => 'city_id должен быть числом',
            'gps_latitude.decimal' => 'gps_latitude должен быть числом',
            'gps_longitude.decimal' => 'gps_longitude должен быть числом',
            'is_published.integer' => 'is_published должен быть числом',
            'title.string' => 'title должен быть строкой',
            'description.string' => 'description должен быть строкой',
            'realtor_comment.string' => 'realtor_comment должен быть строкой',
        ];
    }
}
