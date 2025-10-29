<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth; 

/*
|--------------------------------------------------------------------------
| 1. Public Routes (Accessible to everyone)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    // Landing page view
    return view('user.welcome');
})->name('home');

Route::controller(ProductController::class)->group(function () {
    // View Menu: Allows browsing of products by anyone (logged in or not).
    Route::get('/menu', 'index')->name('menu.index'); 
    Route::get('/menu/{product}', 'show')->name('menu.show'); 
});

/*
|--------------------------------------------------------------------------
| 2. Authentication Routes (User registration and login)
|--------------------------------------------------------------------------
*/

Route::controller(UserController::class)->prefix('auth')->group(function () {
    Route::get('/register', 'showregister')->name('register');
    Route::post('/addUser', 'addUser')->name('addUser');
    Route::get('/showLogin', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.post');
});

/*
|--------------------------------------------------------------------------
| 3. Authenticated Customer Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Route for the user dashboard displaying all products
    Route::get('/user-dashboard/user', [ProductController::class, 'userIndex'])->name('dashboard.user-dashboard');

    // --- Profile Routes ---
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    // --- Order History and Placement ---
    Route::controller(OrderController::class)->group(function () {
        // Add to Cart / View Cart
        Route::post('/cart/add', 'addItemToCart')->name('cart.add');
        Route::get('/cart', 'showCart')->name('cart.show');
        
        // Checkout & Payment
        Route::post('/checkout', 'placeOrder')->name('order.place');
        
        // View Order History
        Route::get('/orders', 'index')->name('order.history');
        Route::get('/orders/{order}', 'show')->name('order.details');
    });
});
/*
|--------------------------------------------------------------------------
| 4. Admin Management Routes (Requires login + Admin Role Check)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    // Admin Dashboard Homepage
    Route::get('/', function () {
        return view('dashboard.admin');
    })->name('dashboard.admin');

    // Product and Category Management
    Route::resource('products', ProductController::class)
        ->only(['index', 'store', 'update', 'destroy', 'create', 'edit']) 
        ->names('products');

    Route::resource('categories', CategoryController::class)
        ->only(['index', 'store', 'update', 'destroy', 'create', 'edit']) 
        ->names('categories');
    
    // User Management
    Route::resource('customers', UserController::class)
        ->only(['index', 'store', 'update', 'destroy', 'create', 'edit']) 
        ->names('customers');

    // Admin Order Tracking and Management
    Route::get('/orders', [OrderController::class, 'adminIndex'])->name('admin.orders.index');
    Route::put('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
});


require __DIR__.'/auth.php';
