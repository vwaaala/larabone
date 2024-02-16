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
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
    Route::get('roles/{role}/destroy', [App\Http\Controllers\RoleController::class, 'destroy'])->name('croles.destroy');

    Route::post('users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::post('users/{id}/force-delete', [App\Http\Controllers\UserController::class, 'forceDelete'])->name('users.forceDelete');
    Route::get('users/{id}/retrieve', [App\Http\Controllers\UserController::class, 'retrieveDeleted'])->name('users.retrieveDeleted');
    Route::put('users/{id}/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('users.changePassword');

    Route::resources([
        'users' => \App\Http\Controllers\UserController::class,
        'roles' => \App\Http\Controllers\RoleController::class,
    ]);
});

