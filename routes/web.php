<?php

declare(strict_types=1);

use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function(): View|Factory {
  return view('welcome');
});

Route::get('/login', function(): JsonResponse {
  return response()->json(['error' => 'Invalid or empty access token.'], 401);
})->name('login');
