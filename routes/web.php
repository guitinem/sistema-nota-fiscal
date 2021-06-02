<?php

use App\Http\Controllers\Records\RecordsController;
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

Route::post('notas', [RecordsController::class, 'store'])->name('records.record');
Route::get('notas', [RecordsController::class, 'index']);
