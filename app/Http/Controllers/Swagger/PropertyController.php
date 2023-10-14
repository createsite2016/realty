<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Post(
 *     path="/api/properties",
 *     summary="Создать объект",
 *     tags={"properties"},
 *     security={{"bearerAuth":{} }},
 *
 *     @OA\RequestBody(
 *          @OA\MediaType(
 *              mediaType="multipart/form-data",
 *              @OA\Schema(
 *                  required={"user_id", "property_type_id","currency_id","country_id", "city_id"},
 *                  @OA\Property(property="user_id", type="integer", example="1"),
 *                  @OA\Property(property="property_type_id", type="integer", example="1"),
 *                  @OA\Property(property="title", type="string", example="Квартира 60кв"),
 *                  @OA\Property(property="rooms", type="integer", example="3"),
 *                  @OA\Property(property="description", type="string", example="Просторная трёшка"),
 *                  @OA\Property(property="realtor_comment", type="string", example="Норм квартира"),
 *                  @OA\Property(property="price", type="integer", example="10000"),
 *                  @OA\Property(property="currency_id", type="integer", example="1"),
 *                  @OA\Property(property="country_id", type="integer", example="1"),
 *                  @OA\Property(property="city_id", type="integer", example="1"),
 *                  @OA\Property(property="address", type="string", example="улица Пушкина, дом Тарахтушкина 15"),
 *                  @OA\Property(property="gps_latitude", type="decimal:9:6", example=45.044800),
 *                  @OA\Property(property="gps_longitude", type="integer", example=45.044800),
 *                  @OA\Property(property="is_published", type="integer", example="1"),
 *                  @OA\Property(
 *                      description="file to upload",
 *                      property="photos[]",
 *                      type="string",
 *                      format="binary",
 *                  ),
 *       )
 *     )
 * ),
 *
 *     @OA\Response(
 *          response=200,
 *          description="ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="array", @OA\Items(
 *                  @OA\Property(property="id", type="integer", example="1"),
 *                  @OA\Property(property="user_id", type="integer", example="1"),
 *                  @OA\Property(property="property_type_id", type="integer", example="1"),
 *                  @OA\Property(property="title", type="string", example="Квартира 60кв"),
 *                  @OA\Property(property="rooms", type="integer", example="3"),
 *                  @OA\Property(property="description", type="string", example="Просторная трёшка"),
 *                  @OA\Property(property="realtor_comment", type="string", example="Норм квартира"),
 *                  @OA\Property(property="price", type="integer", example="10000"),
 *                  @OA\Property(property="currency_id", type="integer", example="1"),
 *                  @OA\Property(property="country_id", type="integer", example="1"),
 *                  @OA\Property(property="city_id", type="integer", example="1"),
 *                  @OA\Property(property="address", type="string", example="улица Пушкина, дом Тарахтушкина 15"),
 *                  @OA\Property(property="gps_latitude", type="integer", example="45.044800"),
 *                  @OA\Property(property="gps_longitude", type="integer", example="45.044800"),
 *                  @OA\Property(property="photos", type="array", @OA\Items(oneOf={
 *                      @OA\Schema(type="string", example="htrx9Q1vUGoB002MbWCNQIhdTLsBkxkLuDmlwia1.png"),
 *                      @OA\Schema(type="string", example="9lln6bKTi0qb9YzN5iUkqzp0dCdbYKIJew7qyJkD.png"),
 *                  })),
 *                  @OA\Property(property="date_added", type="date-time", example="2023-10-12 09:31:25"),
 *                  @OA\Property(property="is_published", type="integer", example="1"),
 *                  @OA\Property(property="created_at", type="date-time", example="2023-10-13T12:39:26.000000Z"),
 *                  @OA\Property(property="updated_at", type="date-time", example="2023-10-13T12:39:26.000000Z"),
 *              )),
 *          ),
 *     ),
 * ),
 *
 *
 * @OA\Get(
 *     path="/api/properties/",
 *     summary="Получить все объекты",
 *     tags={"properties"},
 *     security={{"bearerAuth":{} }},
 *
 *     @OA\Response(
 *          response=200,
 *          description="ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="array", @OA\Items(
 *                  @OA\Property(property="id", type="integer", example="1"),
 *                  @OA\Property(property="user_id", type="integer", example="1"),
 *                  @OA\Property(property="property_type_id", type="integer", example="1"),
 *                  @OA\Property(property="title", type="string", example="Квартира 60кв"),
 *                  @OA\Property(property="rooms", type="integer", example="3"),
 *                  @OA\Property(property="description", type="string", example="Просторная трёшка"),
 *                  @OA\Property(property="realtor_comment", type="string", example="Норм квартира"),
 *                  @OA\Property(property="price", type="integer", example="10000"),
 *                  @OA\Property(property="currency_id", type="integer", example="1"),
 *                  @OA\Property(property="country_id", type="integer", example="1"),
 *                  @OA\Property(property="city_id", type="integer", example="1"),
 *                  @OA\Property(property="address", type="string", example="улица Пушкина, дом Тарахтушкина 15"),
 *                  @OA\Property(property="gps_latitude", type="integer", example="45.044800"),
 *                  @OA\Property(property="gps_longitude", type="integer", example="45.044800"),
 *                  @OA\Property(property="photos", type="array", @OA\Items(oneOf={
 *                      @OA\Schema(type="string", example="htrx9Q1vUGoB002MbWCNQIhdTLsBkxkLuDmlwia1.png"),
 *                      @OA\Schema(type="string", example="9lln6bKTi0qb9YzN5iUkqzp0dCdbYKIJew7qyJkD.png"),
 *                  })),
 *                  @OA\Property(property="date_added", type="date-time", example="2023-10-12 09:31:25"),
 *                  @OA\Property(property="is_published", type="integer", example="1"),
 *                  @OA\Property(property="created_at", type="date-time", example="2023-10-13T12:39:26.000000Z"),
 *                  @OA\Property(property="updated_at", type="date-time", example="2023-10-13T12:39:26.000000Z"),
 *              )),
 *          ),
 *     ),
 * ),
 *
 * @OA\Get(
 *     path="/api/properties/{property}",
 *     summary="Получить один объект",
 *     tags={"properties"},
 *     security={{"bearerAuth":{} }},
 *
 *     @OA\Parameter(
 *          description="ID объекта",
 *          in="path",
 *          name="property",
 *          required=true,
 *          example=1
 *     ),
 *
 *     @OA\Response(
 *          response=200,
 *          description="ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="array", @OA\Items(
 *                  @OA\Property(property="id", type="integer", example="1"),
 *                  @OA\Property(property="user_id", type="integer", example="1"),
 *                  @OA\Property(property="property_type_id", type="integer", example="1"),
 *                  @OA\Property(property="title", type="string", example="Квартира 60кв"),
 *                  @OA\Property(property="rooms", type="integer", example="3"),
 *                  @OA\Property(property="description", type="string", example="Просторная трёшка"),
 *                  @OA\Property(property="realtor_comment", type="string", example="Норм квартира"),
 *                  @OA\Property(property="price", type="integer", example="10000"),
 *                  @OA\Property(property="currency_id", type="integer", example="1"),
 *                  @OA\Property(property="country_id", type="integer", example="1"),
 *                  @OA\Property(property="city_id", type="integer", example="1"),
 *                  @OA\Property(property="address", type="string", example="улица Пушкина, дом Тарахтушкина 15"),
 *                  @OA\Property(property="gps_latitude", type="integer", example="45.044800"),
 *                  @OA\Property(property="gps_longitude", type="integer", example="45.044800"),
 *                  @OA\Property(property="photos", type="array", @OA\Items(oneOf={
 *                      @OA\Schema(type="string", example="htrx9Q1vUGoB002MbWCNQIhdTLsBkxkLuDmlwia1.png"),
 *                      @OA\Schema(type="string", example="9lln6bKTi0qb9YzN5iUkqzp0dCdbYKIJew7qyJkD.png"),
 *                  })),
 *                  @OA\Property(property="date_added", type="date-time", example="2023-10-12 09:31:25"),
 *                  @OA\Property(property="is_published", type="integer", example="1"),
 *                  @OA\Property(property="created_at", type="date-time", example="2023-10-13T12:39:26.000000Z"),
 *                  @OA\Property(property="updated_at", type="date-time", example="2023-10-13T12:39:26.000000Z"),
 *              )),
 *          ),
 *     ),
 * ),
 *
 *
 *
 *
 * @OA\Delete(
 *     path="/api/properties/{property}",
 *     summary="Удалить объект",
 *     tags={"properties"},
 *     security={{"bearerAuth":{} }},
 *
 *     @OA\Parameter(
 *          description="ID объекта",
 *          in="path",
 *          name="property",
 *          required=true,
 *          example=1
 *     ),
 *
 *     @OA\Response(
 *          response=200,
 *          description="ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="done"),
 *          ),
 *     ),
 * ),
 *
 */
class PropertyController extends Controller
{

}
