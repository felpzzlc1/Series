<?php

use App\Http\Controllers\Api\CredentialsController;
use App\Http\Controllers\Api\EpisodeController;
use App\Http\Controllers\Api\SeriesController;
use App\Models\Episode;
use App\Models\Series;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function() {

    Route::apiResource('/series', SeriesController::class);
    Route::get('series/{series}/seasons', [EpisodeController::class, 'index']);
    Route::get('series/{series}/episodes', [EpisodeController::class, 'getEpisodes']);
    Route::patch('/episodes/{episode}', [EpisodeController::class, 'watched']);
});

Route::post('/login', function(Request $request) {
    $credentials = $request->only(['email', 'password']);
    if (Auth::attempt($credentials) === false) {
            return response()->json('Unauthorized', 401);
        };
    $user = Auth::user();
    $token = $user->createToken('token');

    return response()->json($token->plainTextToken);
});
