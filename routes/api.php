<?php

declare(strict_types=1);

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::controller(UserController::class)
  ->prefix('users')
  ->group(function(): void {
    Route::middleware('auth:sanctum')->delete('delete-user', 'deleteUser');
    Route::middleware('auth:sanctum')->get('/logged-user', 'loggedUser');
    Route::middleware('auth:sanctum')->get('/logout', 'logout');
    Route::middleware('auth:sanctum')->patch('/update-email', 'updateEmail');
    Route::middleware('auth:sanctum')->patch('/update-name', 'updateName');
    Route::middleware('auth:sanctum')->patch('/update-password', 'updatePassword');
    Route::patch('/reset-password', 'resetPassword');
    Route::post('/forgot-password', 'forgotPassword');
    Route::post('/login', 'login');
    Route::post('/register', 'register');
  });
