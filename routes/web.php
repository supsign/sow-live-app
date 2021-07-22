<?php

use App\Http\Controllers\SOW;
use App\Http\Controllers\TestController;
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

Route::get('/test', [TestController::class, 'test']);
Route::get('/', [SOW::class, 'competition'])->name('competition');
Route::get('stage/{stage}', [SOW::class, 'stage'])->name('stage');
Route::get('stage/{stage}/category/{category}', [SOW::class, 'category'])->name('category');
Route::post('/getresults', [SOW::class, 'getResults'])->name('getResults');
