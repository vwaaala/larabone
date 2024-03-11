<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\TestDBController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
$installed = Storage::disk('public')->exists('installed');
if ($installed === true) {
    // Define a route for the homepage, returning the 'app' layout view
    Route::get('/', function () {
        return view('layouts.app');
    });

    // Define authentication routes with email verification disabled
    Auth::routes(['verify' => false]);

    // Group routes that require authentication middleware
    Route::middleware(['auth', 'web'])->group(function () {

        // Defining route for the home page after authentication
        Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

        // Defining routes for managing permissions
        Route::get('permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');

        // Defining routes for specific user operations
        Route::delete('users/{id}/force-delete', [App\Http\Controllers\UserController::class, 'forceDelete'])->name('users.forceDelete');
        Route::get('users/{id}/retrieve', [App\Http\Controllers\UserController::class, 'retrieveDeleted'])->name('users.retrieveDeleted');
        Route::put('users/{id}/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('users.changePassword');

        // Define resourceful routes for users and roles
        Route::resources(['users' => UserController::class, 'roles' => RoleController::class,]);

        // Defining resourceful routes for settings
        Route::get('settings/index', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings.index');
        Route::get('settings/general-info', [App\Http\Controllers\SettingsController::class, 'generalInfo'])->name('settings.generalInfo');
        Route::get('settings/general-edit', [App\Http\Controllers\SettingsController::class, 'generalEdit'])->name('settings.generalEdit');
        Route::post('settings/general-update', [App\Http\Controllers\SettingsController::class, 'generalUpdate'])->name('settings.generalUpdate');
        Route::get('settings/database-info', [App\Http\Controllers\SettingsController::class, 'databaseInfo'])->name('settings.databaseInfo');
        Route::get('settings/database-edit', [App\Http\Controllers\SettingsController::class, 'databaseEdit'])->name('settings.databaseEdit');
        Route::post('settings/database-update', [App\Http\Controllers\SettingsController::class, 'databaseUpdate'])->name('settings.databaseUpdate');
        Route::get('settings/debug-info', [App\Http\Controllers\SettingsController::class, 'debugInfo'])->name('settings.debugInfo');
        Route::get('settings/debug-edit', [App\Http\Controllers\SettingsController::class, 'debugEdit'])->name('settings.debugEdit');
        Route::get('settings/log-info', [App\Http\Controllers\SettingsController::class, 'logInfo'])->name('settings.logInfo');
        Route::get('settings/log-edit', [App\Http\Controllers\SettingsController::class, 'logEdit'])->name('settings.logEdit');
        Route::get('settings/mail-info', [App\Http\Controllers\SettingsController::class, 'mailInfo'])->name('settings.mailInfo');
        Route::get('settings/mail-edit', [App\Http\Controllers\SettingsController::class, 'mailEdit'])->name('settings.mailEdit');

    });

} else {
    /*
    ------------------------------Install application-------------------------------
    */
    Route::get('/{url?}', function () {
        return redirect('/setup');
    })->where('url', '^(?!setup).*$');
    Route::get('/setup', [SetupController::class, 'viewSetup'])->name('viewSetup');
    Route::get('/setup/step-1', [SetupController::class, 'viewStep1'])->name('viewStep1');
    Route::get('/setup/step-2', [SetupController::class, 'viewStep2'])->name('viewStep2');
    Route::get('/setup/step-3', [SetupController::class, 'viewStep3'])->name('viewStep3');
    Route::get('/setup/step-4', [SetupController::class, 'viewStep3'])->name('viewStep4');
    Route::get('/setup/getNewAppKey', [SetupController::class, 'getNewAppKey'])->name('getNewAppKey');
    Route::post('/setup/testDB', [TestDBController::class, 'testDB'])->name('testDB');
    Route::post('/setup/step-2', [SetupController::class, 'setupStep1'])->name('setupStep1');
    Route::post('/setup/step-3', [SetupController::class, 'setupStep2'])->name('setupStep2');
    Route::post('/setup/step-4', [SetupController::class, 'setupStep3'])->name('setupStep3');
    Route::post('/setup/lastStep', [SetupController::class, 'lastStep'])->name('lastStep');
    Route::get('/setup/lastStep', function () {
        return redirect('/setup', 301);
    });
    Route::get('/setup/finish', function () {

        return view('setup.finished');
    });
}
