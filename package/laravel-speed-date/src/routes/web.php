<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Bunker\LaravelSpeedDate\Http\Controllers', 'middleware' => ['auth', 'web'], 'as' => 'speed_date.'], function () {
    Route::get('events/index', 'DatingEventController@index')->name('index');
    Route::get('events/create', 'DatingEventController@create')->name('create');
    Route::post('events/store', 'DatingEventController@store')->name('store');
    Route::get('events/{uuid}/show', 'DatingEventController@show')->name('show');
    Route::get('events/{uuid}/edit', 'DatingEventController@edit')->name('edit');
    Route::put('events/{uuid}', 'DatingEventController@update')->name('update');
});

