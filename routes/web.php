<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => false]);

Route::get('/locale/{locale}', function ($locale) {

})->name('locale');
// Auth middleware for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('/queries', [App\Http\Controllers\QueryController::class, 'index'])->name('query');


    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::get('users/{id}/view', [App\Http\Controllers\UserController::class, 'view'])->name('user.view');
    Route::delete('users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
    Route::post('users/{id}/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('user.change-pass');

});

