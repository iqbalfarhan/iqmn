<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ImsakiyahController;
use App\Http\Controllers\API\KelasController;
use App\Models\Post;
use App\Models\User;
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

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', [AuthController::class, 'me']);

    Route::prefix('/kelas')->group(function(){
        Route::get('/', [KelasController::class, 'index']);
        Route::get('/{group}', [KelasController::class, 'show']);
        Route::get('/{group}/materials', [KelasController::class, 'materials']);
    });
});

Route::post(uri: '/login', action: [AuthController::class, 'login']);
Route::post(uri: '/register', action: [AuthController::class, 'register']);

Route::get("post", function(){
    return Post::with('user')->where('show', true)->get();
});

Route::get("post/{slug}", function($slug) {
    return Post::with('user')->where('slug', $slug)->first();
});
