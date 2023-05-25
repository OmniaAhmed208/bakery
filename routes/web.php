<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');
Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');

Route::get('/reservation/step-one', [FrontendReservationController::class, 'stepOne'])->name('reservations.step.one');
Route::post('/reservation/step-one', [FrontendReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
Route::get('/reservation/step-two', [FrontendReservationController::class, 'stepTwo'])->name('reservations.step.two');
Route::post('/reservation/step-two', [FrontendReservationController::class, 'StoreStepTwo'])->name('reservations.store.step.two');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/add-to-cart', [FrontendOrderController::class, 'addToCart'])->name('orders.addToCart');
    Route::POST('/add-menu-to-cart', [FrontendOrderController::class, 'addMenuToCart'])->name('orders.addMenuToCart');
    Route::delete('/delete-cart-item/{id}', [FrontendOrderController::class, 'deleteCartItem'])->name('orders.deleteCartItem');

    Route::get('/user-information', [FrontendOrderController::class, 'userInformation'])->name('orders.Information');
    Route::POST('/add-user-information', [FrontendOrderController::class, 'addUserInformation'])->name('orders.addUserInformation');

    Route::get('/checkout', [FrontendOrderController::class, 'checkout'])->name('orders.checkout');
    Route::POST('/place_order', [FrontendOrderController::class, 'palceOrder'])->name('orders.palceOrder');
    Route::get('/pending_orders', [FrontendOrderController::class, 'pendingOrders'])->name('orders.pendingOrders');

    Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');
});


Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/tables',TableController ::class);
    Route::resource('/reservations', ReservationController::class);
    Route::resource('/orders', OrderController::class);
});


require __DIR__.'/auth.php';
