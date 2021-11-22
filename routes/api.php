<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
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

Route::group(['prefix' => 'article'], function() {
   Route::get('list', [ArticleController::class, 'index']);
   Route::get('show/{slug}', [ArticleController::class, 'show']);
   Route::get('like/{id}', [ArticleController::class, 'like']);
   Route::get('viewed/{id}', [ArticleController::class, 'incrementView']);
   Route::post('comments/add/', [ArticleController::class, 'commentAdd']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
