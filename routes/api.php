<?php
declare(strict_types=1);

use App\Http\Controllers\GameController;
use App\Http\Controllers\ResolvedController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')
    ->group(static function () {
        Route::post('/game', [GameController::class, 'create']);

        Route::post('/game/{id}/solve', [ResolvedController::class, 'solve']);
    });
