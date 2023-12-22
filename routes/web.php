<?php

use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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


Route::middleware('guest')->group(function () {
    Route::get('/', App\Livewire\Pages\Welcome::class)->name('welcome');
    Route::get('/login', App\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', App\Livewire\Auth\Register::class)->name('register');

    Route::get('/auth/redirect', [SocialiteController::class, 'redirect'])->name('auth.redirect');
    Route::get('/auth/callback', [SocialiteController::class, 'callback'])->name('auth.callback');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', App\Livewire\Pages\Home::class)->name('home');
    Route::get('/about', App\Livewire\Pages\About::class)->name('about');
    Route::get('/profile', App\Livewire\Pages\Profile::class)->name('profile');

    Route::middleware('can:permission.index')->get('/permission', App\Livewire\Permission\Index::class)->name('permission.index');
    Route::middleware('can:user.index')->get('/user', App\Livewire\User\Index::class)->name('user.index');

    Route::middleware('can:git.index')->get('/git', App\Livewire\Git\Index::class)->name('git.index');

    Route::middleware('can:group.index')->get('/group', App\Livewire\Group\Index::class)->name('group.index');
    Route::middleware('can:group.mine')->get('/group/mine', App\Livewire\Group\Mine::class)->name('group.mine');

    Route::middleware('can:material.index')->get('/material', App\Livewire\Material\Index::class)->name('material.index');
    Route::middleware('can:material.cari')->get('/material/cari', App\Livewire\Material\Cari::class)->name('material.cari');
    Route::middleware('can:material.comot')->get('/material/comot', App\Livewire\Material\Comot::class)->name('material.comot');
    Route::middleware('can:material.create')->get('/material/create', App\Livewire\Material\Form::class)->name('material.create');
    Route::middleware('can:material.edit')->get('/material/{material}/edit', App\Livewire\Material\Form::class)->name('material.edit');
    Route::middleware('can:material.show')->get('/material/{material}', App\Livewire\Material\Show::class)->name('material.show');
    Route::middleware('can:material.quiz')->get('/material/{material}/quiz', App\Livewire\Material\Quiz::class)->name('material.quiz');
});
