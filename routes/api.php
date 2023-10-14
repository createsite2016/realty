<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropertyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], static function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['middleware' => ['api','jwt.auth'], 'prefix' => 'properties'], static function () {
    Route::post('/', [PropertyController::class, 'store'])->name('properties.store');
    Route::get('/', [PropertyController::class, 'index'])->name('properties.index');
    Route::get('/{property}', [PropertyController::class, 'show'])->name('properties.show');
    Route::delete('/{property}', [PropertyController::class, 'destroy']);
});
