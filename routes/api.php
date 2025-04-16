<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerSkillStatController;
use App\Http\Controllers\PlayerGameStatController;
use App\Http\Controllers\TeamMatchController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', RegisterController::class)->name('register');
Route::post('/login', LoginController::class)->name('login');
Route::post('/logout', LogoutController::class)->name('logout');
Route::get('/refresh-token', [LoginController::class, 'refreshToken'])->name('refresh-token');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('/teamMatch', TeamMatchController::class);
/* */
Route::group(['middleware'=>['auth:api']], function(){
    Route::apiResource('/players', PlayerController::class);
    Route::apiResource('/teams', TeamController::class);
    Route::apiResource('/playerSkillStats', PlayerSkillStatController::class);
    Route::get('/playerGameStats/custom', 'PlayerGameStatController@custom');
    Route::apiResource('/playerGameStats', PlayerGameStatController::class);
    // Route::apiResource('/playerGameStats', PlayerGameStatController::class, ['except' => 'index']);
    // Route::get('playerGameStats/{id}', [
    //  'as' => 'playerGameStats.index',
    //  'uses' => 'PlayerGameStatController@index'
    // ]);
    Route::apiResource('/teamMatches', TeamMatchController::class);

});
