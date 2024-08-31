<?php

use App\Http\Controllers\API\ImsakiyahController;
use App\Models\Post;
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

Route::get("post", function(){
    return Post::with('user')->where('show', true)->get();
});

Route::get("post/{slug}", function($slug) {
    return Post::with('user')->where('slug', $slug)->first();
});

Route::get("imsakiyah", [ImsakiyahController::class, "index"]);
Route::get("imsakiyah/{imsakiyah}", [ImsakiyahController::class, "show"]);
