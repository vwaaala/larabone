<?php

use Illuminate\Support\Facades\Route;

Route::name('speed_date.')->middleware(['web', 'auth'])->group(function () {
    Route::prefix('events')->name('events.')->group(function () {
        Route::controller(\Bunker\LaravelSpeedDate\Http\Controllers\DatingEventController::class)->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('{event}/show', 'show')->name('show');
            Route::get('{event}/edit', 'edit')->name('edit');
            Route::put('{event}/update', 'update')->name('update');
        });
    });
    Route::prefix('votes')->name('votes.')->group(function () {
        Route::controller(\Bunker\LaravelSpeedDate\Http\Controllers\EventRatingController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('{uuid}/show', 'show')->name('show');
            Route::get('{uuid}/edit', 'edit')->name('edit');
            Route::put('{uuid}/update', 'update')->name('update');
        });
    });
});


