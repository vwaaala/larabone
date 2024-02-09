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


// This method registers the typical authentication routes for the application.
// These routes include login, registration, logout, and password reset routes.
// Auth::routes(['verify' => true]); // Uncomment to enable email verification, also add 'verified' in route middleware array
Auth::routes(); // Comment if enabled email verification

/**
 * Route definition to handle changing the locale/language.
 *
 * @param string $locale The locale/language code to be set.
 * @return \Illuminate\Routing\Route Route instance.
 */
Route::get('/locale/{locale}', function ($locale) {
    // Your route logic to handle locale/language change goes here.
})->name('locale');


// Auth middleware for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('roles', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index')->middleware(['role:admin']);
    Route::get('roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('role.create')->middleware(['role:admin']);
    Route::post('roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('role.store')->middleware(['role:admin']);
    Route::get('roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit')->middleware(['role:admin']);
    Route::put('roles/{id}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('role.update')->middleware(['role:admin']);
    Route::post('roles/{id}/destroy', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role.destroy')->middleware(['role:admin']);
    Route::post('roles/{id}/delete', [App\Http\Controllers\RoleController::class, 'forceDelete'])->name('role.forceDelete')->middleware(['role:admin']);
    Route::get('roles/{id}/retrieve', [App\Http\Controllers\RoleController::class, 'retrieveDeleted'])->name('role.retrieveDeleted')->middleware(['role:admin']);

    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index')->middleware(['role:admin']);
    Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create')->middleware(['role:admin']);
    Route::post('users/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store')->middleware(['role:admin']);
    Route::get('users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('users/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::put('users/{id}/change-password', [App\Http\Controllers\UserController::class, 'changeUserPassword'])->name('user.change-pass');
    Route::get('users/{id}/view', [App\Http\Controllers\UserController::class, 'view'])->name('user.view');
    Route::post('users/{id}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy')->middleware(['role:admin']);
    Route::post('users/{id}/delete', [App\Http\Controllers\UserController::class, 'forceDelete'])->name('user.forceDelete')->middleware(['role:admin']);
    Route::get('users/{id}/retrieve', [App\Http\Controllers\UserController::class, 'retrieveDeleted'])->name('user.retrieveDeleted')->middleware(['role:admin']);

//    // Route for displaying a listing of permissions
//    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
//
//    // Route for showing the form for creating a new permission
//    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
//
//    // Route for storing a newly created permission in storage
//    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
//
//    // Route for displaying the specified permission
//    Route::get('/permissions/{permission}', [PermissionController::class, 'show'])->name('permissions.show');
//
//    // Route for showing the form for editing the specified permission
//    Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
//
//    // Route for updating the specified permission in storage
//    Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
//
//    // Route for deleting the specified permission from storage
//    Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    Route::delete('permissions/destroy', [\App\Http\Controllers\PermissionController::class, 'massDestroy'])->name('permissions.massDestroy');
    Route::resource('permissions', \App\Http\Controllers\PermissionController::class);


});

