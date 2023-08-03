<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'merchant.'], function () {
    Route::get('/', Home::class);
});
