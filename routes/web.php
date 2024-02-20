<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

//route to show categpry page

Route::get('/view_category', [AdminController::class, 'view_category']);

Route::post('/add_category', [AdminController::class, 'add_category']);

// route to delete catagory

Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

// route to show add product page

Route::get('/view_product', [AdminController::class, 'view_product']);

// add product route

Route::post('/add_product', [AdminController::class, 'add_product']);

// show product view route

Route::get('/show_product', [AdminController::class, 'show_product']);

// route to delete product

Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

// route to show edit page

Route::get('/update_product/{id}', [AdminController::class, 'update_product']);

// route to actually update product

Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

// route to sen email

Route::get('/send_email/{id}', [AdminController::class, 'send_email']);

// route to actually send email to the user

Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email']);

// route to  show all product details

Route::get('/product_details/{id}', [HomeController::class, 'product_details']);

//add to cart route

Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);

// show items added to cart route

Route::get('/show_cart', [HomeController::class, 'show_cart']);

// reove cart route 

Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

// route to cash on delivery order

Route::get('/cash_order', [HomeController::class, 'cash_order']);

// route for cardpayment using stripe

Route::get('/stripe_payment/{total_price}', [HomeController::class, 'stripe_payment']);


// route for actual payment
Route::post('/stripe/{total_price}', [HomeController::class, 'stripePost'])->name('stripe.post');

// show order on admin pannel

Route::get('/order', [AdminController::class, 'order']);

// route to update order

Route::get('/deliver/{id}', [AdminController::class, 'deliver']);

// route to print pdf receipt of the particular order

Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);

// route to search in order admin panel

Route::get('/search', [AdminController::class, 'search']);

// route to show all orders a cistomer has

Route::get('show_order', [HomeController::class, 'show_order'])->middleware('auth');

// route to cancel order

Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);

// route to addcomment

Route::post('/add_comment', [HomeController::class, 'add_comment'])->middleware('auth');

// route to add reply

Route::post('/add_reply', [HomeController::class, 'add_reply'])->middleware('auth');

// route to serach for products

Route::get('/search_product', [HomeController::class, 'search_product']);