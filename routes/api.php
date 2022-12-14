<?php

use App\Http\Controllers\Api\MemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
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

Route::post('/tokens/create', [AuthController::class, 'createToken']);
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/tokens/delete', [AuthController::class, 'createDelete']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

############################ Api Route Start  ################################
Route::post('/tokens/create', [AuthController::class, 'createToken']);