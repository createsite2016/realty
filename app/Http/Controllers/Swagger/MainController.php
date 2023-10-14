<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="My Doc API",
 *     version="1.0.0"
 * ),
 * @OA\PathItem(
 *     path="/api/"
 * )
 *
 * @OA\Components(
 *     @OA\SecurityScheme(
 *          securityScheme="bearerAuth",
 *          type="http",
 *          scheme="bearer"
 *     )
 * )
 */
class MainController extends Controller
{
    //
}
