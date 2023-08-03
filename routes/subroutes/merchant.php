<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'merchant.'], function () {
    // Route::group(['middleware' => 'auth:merchant'], function () {
        Route::get('/', 'HomeController');
    // });
});
