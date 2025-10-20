<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user.user');
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
    Route::get('/admin', function () {
        return view('dashboard.admin');
    });

    
});
});

Route::controller(UserController::class)->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/register', 'showregister');
        Route::post('/addUser', 'addUser');
        Route::get('/showLogin', 'showLogin')->name('login');
        Route::post('/login', 'login');
        
    });
});

require __DIR__.'/auth.php';
