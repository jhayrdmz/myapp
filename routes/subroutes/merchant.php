<?php

use App\Http\Controllers\Merchant\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Merchant\Auth\PasswordResetLinkController;
use App\Http\Controllers\Merchant\Auth\NewPasswordController;
use App\Http\Controllers\Merchant\Auth\RegisteredUserController;
use App\Http\Controllers\Merchant\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Merchant\Auth\VerifyEmailController;
use App\Http\Controllers\Merchant\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Merchant\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Merchant\Auth\PasswordController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'merchant.'], function () {

    // merchant guest routes
    Route::group([
        'middleware' => 'guest:merchant', 
        'prefix' => 'auth',
        'as' => 'auth.'], function () {

            Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

            Route::post('register', [RegisteredUserController::class, 'store'])
                ->name('register.store');

            Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

            Route::post('login', [AuthenticatedSessionController::class, 'store'])
                ->name('login.store');

            Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

            Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

            Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

            Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');

    }); // end merchant guest routes

    // merchant authenticated routes
    Route::group(['middleware' => 'auth:merchant'], function () {

        Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
            Route::get('verify-email', [EmailVerificationPromptController::class])
                ->name('verification.notice');

            Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

            Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

            Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

            Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

            Route::put('password', [PasswordController::class, 'update'])->name('password.update');

            Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
        });

        Route::get('/', Home::class);
    }); // end merchant authenticated routes
});
