<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::controller(UserController::class)->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/register', 'showregister');
        Route::post('/addUser', 'addUser');
        Route::get('/showLogin', 'showLogin')->name('login');
        Route::post('/login', 'login');
        
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {

    //Admin Dashboard
    Route::get('/admin', function () {
        return view('dashboard.admin');
    })->name('dashboard.admin');

    Route::resource('products', ProductController::class)
                    ->only(['index', 'store', 'update', 'destroy', 'create', 'edit']) 
            ->names('products');

    Route::resource('categories', CategoryController::class)
                    ->only(['index', 'store', 'update', 'destroy', 'create', 'edit']) 
            ->names('categories');
});
});



require __DIR__.'/auth.php';
