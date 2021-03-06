<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Records\RecordsController;
use App\Http\Controllers\UsersController;

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
Route::get('notas', function() {
    return view('records.index');
})->name('records');


Route::group(['prefix' => 'dashboard'], function() {
    /** Login Page */
    Route::group(['prefix' =>'/login'], function() {
        Route::get('', function () {
            return view('dashboard.login');
        })->name('dashboard.login');
        Route::post('', [LoginController::class, 'authenticate'])->name('dashboard.logon');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/main', [RecordsController::class, 'index'])->name('dashboard.main');

        Route::get('/logout', [LoginController::class, 'logout'])->name('dashboard.logout');

        // Records Resources
        Route::group(['prefix' => 'records'], function() {
            Route::post('status/{id}', [RecordsController::class, 'updateStatus']);
            Route::post('/{id}', [RecordsController::class, 'destroy']);
        });

        // Users Resources
        Route::group(['prefix' => 'users'], function() {
            Route::get('', [UsersController::class, 'index'])->name('dashboard.user.index');

            Route::post('create', [UsersController::class, 'store'])->name('dashboard.user.create');
            Route::get('create', function(){
                return view('dashboard.user.create');
            })->name('dashboard.user.create');

            Route::get('edit/{id}', [UsersController::class, 'edit'])->name('dashboard.user.edit');
            Route::post('edit/{id}', [UsersController::class, 'update'])->name('dashboard.user.edit');

            Route::post('delete/{id}', [UsersController::class, 'destroy'])->name('dashboard.user.delete');
        });
    });
});
