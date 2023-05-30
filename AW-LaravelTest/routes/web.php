<?php

use App\Actions\Auth\ViewLogin;
use App\Actions\Auth\Login;
use App\Actions\Auth\ViewRegister;
use App\Actions\Profile\DeleteProfile;
use App\Actions\Auth\UpdatePassword;
use App\Actions\Profile\EditProfile;
use App\Actions\Profile\UpdateProfile;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('guest')->group(function(){
    Route::get('register', ViewRegister::class)->name('register');
    Route::get('login', ViewLogin::class)->name('login');
    Route::post('login', Login::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', EditProfile::class)->name('EditProfile');
    Route::put('/profile/update', UpdateProfile::class)->name('UpdateProfile');
    Route::put('/profile', UpdatePassword::class)->name('UpdatePassword');
    Route::delete('/profile', DeleteProfile::class)->name('DeleteProfile');
});

require __DIR__.'/auth.php';
