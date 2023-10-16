<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Post(
 *     path="/api/auth/login?email={email}&password={password}",
 *     summary="Авторизация",
 *     tags={"auth"},
 *
 *     @OA\Parameter(
 *          description="email пользователя",
 *          in="path",
 *          name="email",
 *          required=true,
 *          example="z@z.ru"
 *     ),
 *     @OA\Parameter(
 *          description="email пользователя",
 *          in="path",
 *          name="password",
 *          required=true,
 *          example="12341234"
 *     ),
 *
 *     @OA\Response(
 *          response=200,
 *          description="ok",
 *          @OA\JsonContent(
 *                  @OA\Property(property="access_token", type="string", example="uierjioerj4"),
 *                  @OA\Property(property="token_type", type="string", example="bearer"),
 *                  @OA\Property(property="expires_in", type="integer", example="3600"),
 *          ),
 *     ),
 * ),
 *
 * @OA\Post(
 *     path="/api/auth/me",
 *     summary="Получить данные по токену пользователя",
 *     tags={"auth"},
 *     security={{"bearerAuth":{} }},
 *
 *     @OA\Response(
 *          response=200,
 *          description="ok",
 *          @OA\JsonContent(
 *                  @OA\Property(property="id", type="integer", example="1"),
 *                  @OA\Property(property="name", type="string", example="Ivan"),
 *                  @OA\Property(property="email", type="string", example="a@a.ru"),
 *                  @OA\Property(property="email_verified_at", type="string", example=null),
 *                  @OA\Property(property="created_at", type="date-time", example="2023-10-13T14:49:20.000000Z"),
 *                  @OA\Property(property="updated_at", type="date-time", example="2023-10-13T14:49:20.000000Z"),
 *                  @OA\Property(property="role_id", type="integer", example="1"),
 *                  @OA\Property(property="telegram_id", type="string", example="1234567"),
 *                  @OA\Property(property="phone_number", type="string", example="89991111111"),
 *                  @OA\Property(property="is_active", type="integer", example="1"),
 *                  @OA\Property(property="api_token", type="string", example="1234567"),
 *          ),
 *     ),
 * ),
 *
 * @OA\Post(
 *     path="/api/auth/refresh",
 *     summary="Получить обновлённый токен",
 *     tags={"auth"},
 *     security={{"bearerAuth":{} }},
 *
 *     @OA\Response(
 *          response=200,
 *          description="ok",
 *          @OA\JsonContent(
 *                  @OA\Property(property="access_token", type="string", example="uierjioerj4"),
 *                  @OA\Property(property="token_type", type="string", example="bearer"),
 *                  @OA\Property(property="expires_in", type="integer", example="3600"),
 *          ),
 *     ),
 * ),
 *
 *
 * @OA\Post(
 *     path="/api/auth/register",
 *     summary="Регистрация пользователя",
 *     tags={"auth"},
 *
 *     @OA\RequestBody(
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  required={"email", "password","password_confirmation","name"},
 *                  @OA\Property(property="email", type="string", example="z@z.ru"),
 *                  @OA\Property(property="password", type="string", example="12341234"),
 *                  @OA\Property(property="password_confirmation", type="string", example="12341234"),
 *                  @OA\Property(property="name", type="string", example="Иван"),
 *                  @OA\Property(property="telegram_id", type="string", example="203948923"),
 *                  @OA\Property(property="phone_number", type="string", example="89991111111"),
 *                  @OA\Property(property="is_active", type="integer", example="1"),
 *                  @OA\Property(property="api_token", type="string", example="j2d9jd39"),
 *              ),
 *          ),
 *     ),
 *
 *     @OA\Response(
 *          response=200,
 *          description="ok",
 *          @OA\JsonContent(
 *                  @OA\Property(property="status", type="string", example="success"),
 *                  @OA\Property(property="code", type="integer", example="1"),
 *                  @OA\Property(property="message", type="string", example="Users successfully registered"),
 *                  @OA\Property(property="data", type="array", @OA\Items(
 *                      @OA\Property(property="email", type="string", example="a@a.ru"),
 *                      @OA\Property(property="name", type="string", example="Ivan"),
 *                      @OA\Property(property="created_at", type="date-time", example="2023-10-13T12:39:26.000000Z"),
 *                      @OA\Property(property="updated_at", type="date-time", example="2023-10-13T12:39:26.000000Z"),
 *                      @OA\Property(property="id", type="integer", example="1"),
 *                  )),
 *          ),
 *     ),
 *
 *
 * ),
 */
class AuthController extends Controller
{
}
