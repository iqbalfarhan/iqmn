<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', App\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', App\Livewire\Auth\Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', App\Livewire\Pages\Home::class)->name('home');
    Route::get('/about', App\Livewire\Pages\About::class)->name('about');
    Route::get('/profile', App\Livewire\Pages\Profile::class)->name('profile');

    Route::get('/material', App\Livewire\Material\Index::class)->name('material.index');
    Route::get('/material/{material}', App\Livewire\Material\Show::class)->name('material.show');
});
