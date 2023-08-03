<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'pos.'], function () {
    Route::get('/', 'HomeController');
});
