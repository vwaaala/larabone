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


    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::get('users/{id}/view', [App\Http\Controllers\UserController::class, 'view'])->name('users.view');
    Route::post('users/{id}/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('users.change-pass');
    Route::post('users/{id}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::post('users/{id}/force-delete', [App\Http\Controllers\UserController::class, 'forceDelete'])->name('users.forceDelete');
    Route::get('users/{id}/retrieve', [App\Http\Controllers\UserController::class, 'retrieveDeleted'])->name('users.retrieveDeleted');
    Route::resources([
        'roles' => \App\Http\Controllers\RoleController::class,
    ]);
});

