<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

    Route::get('dashboard', [TaskController::class, 'index']);

    Route::controller(TaskController::class)->prefix('task')->group(function (){
//        Route::get('dashboard', [TaskController::class, 'index']);
        Route::get('show/{id}', 'show')->name('task.show');
        Route::get('edit/{id}', 'edit')->name('task.edit');
        Route::put('edit/{id}', 'update')->name('task.update');
        Route::delete('destroy/{id}', 'destroy')->name('task.destroy');
        Route::post('create', 'create')->name('task.create');
    });

    Route::get('logout', 'logout')->middleware('auth')->name('logout');

});
