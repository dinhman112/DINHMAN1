<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use App\Http\Middleware\ChecklogIn;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerAccountController;
use Darryldecode\Cart\Cart;
use GuzzleHttp\Middleware;
use Illuminate\Routing\Router;
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

// Register 
Route::get('register', [LoginController::class, 'getformSign'])->name('formRegister');
Route::post('register', [LoginController::class, 'postSign'])->name('formRegister');
// Admin login 
Route::get('login', [LoginController::class, 'getLogin'])->name('login'); 
Route::post('login', [LoginController::class, 'postLogin'])->name('postlogin'); 

Route::prefix('admin')->middleware(['ChecklogIn', 'auth'])->group(function (){
    Route::get('home',  [LoginController::class, 'index'])->name('admin.home');
    // Prefix User
    Route::prefix('user')->group(function(){
        Route::get('/',  [ManagerAccountController::class, 'listUser'])->name('admin.user');
        Route::get('edit/{id?}', [ManagerAccountController::class, 'editUser']);
        Route::post('edit',  [ManagerAccountController::class, 'updateUser'])->name('admin.user.post');
        Route::get('delete',  [ManagerAccountController::class, 'deleteUser'])->name('admin.user.delete');
    });
    // Prefix Product
    Route::prefix('product')->group(function(){
        Route::get('/',  [HomeController::class, 'listProduct'])->name('admin.product');
        Route::get('add',  [HomeController::class, 'getFormProduct'])->name('admin.product.add');
        Route::post('add',  [HomeController::class, 'postProduct'])->name('admin.product.add');
        Route::get('edit/{id?}', [HomeController::class, 'editProduct']);
        Route::post('edit',  [HomeController::class, 'updateProduct'])->name('admin.product.post');
        Route::get('delete',  [HomeController::class, 'deleteProduct'])->name('admin.product.delete');
    });

    // Manager comment
    Route::prefix('comment')->group(function(){
        Route::get('/', [HomeController::class, 'commentUser'])->name('admin.comment.home');
        Route::get('edit/{id}', [HomeController::class, 'editComment'])->name('admin.comment.edit');
        Route::post('edit/{id}', [HomeController::class, 'updateComment'])->name('admin.comment.edit');
        Route::get('/{id}', [HomeController::class, 'deleteComment'])->name('admin.comment.delete');
    });
    // Prefix Category 
    Route::prefix('category')->group(function(){
        Route::get('/',  [HomeController::class, 'listCategory'])->name('admin.category');
        Route::post('add',  [HomeController::class, 'postCategory'])->name('admin.category.add');
        Route::get('edit/{id?}',  [HomeController::class, 'editCategory'])->name('admin.category.edit');
        Route::post('edit',  [HomeController::class, 'updateCategory'])->name('admin.category.post');
        Route::get('delete',  [HomeController::class, 'deleteCategory'])->name('admin.category.delete');
    });
    // Cart manager
    Route::prefix('cart')->group(function(){
        Route::get('/',  [CartController::class, 'listCartAdmin'])->name('admin.cart.home');
        Route::get('delete',  [CartController::class, 'deleteCartAdmin'])->name('admin.cart.delete');
        Route::get('verify/{id?}',  [CartController::class, 'verifyCart'])->name('admin.cart.cartcheckout');
        Route::post('verify',  [CartController::class, 'postverifyCart'])->name('admin.cart.cartcheckout');
    });
    Route::get('error', [LoginController::class, 'error403'])->name('admin.error');
});
Route::get('/', [HomeController::class, 'logOut'])->name('logout');


// Client view product

Route::prefix('home')->middleware(['auth'])->group(function(){
        // Product 
        Route::get('mail', function(){
            return view('client.mail');
        });
        Route::get('/home', [ClientController::class, 'listAll'])->name('home.home');
        Route::get('detail', [ClientController::class, 'detailProduct'])->name('home.details');
        Route::post('detail', [ClientController::class, 'commentPrd'])->name('home.comment');
        Route::get('cate', [ClientController::class, 'listCategory'])->name('home.cate');
        Route::post('find', [ClientController::class, 'findProduct'])->name('home.findProduct');
        // Cart client 
        Route::prefix('cart')->group(function (){
            Route::get('home/{id?}', [CartController::class, 'getCart'])->name('home.cart.carthome');
            Route::get('add/{id?}', [CartController::class, 'addToCart'])->name('cart.addcart');
            Route::get('delete/{id?}', [CartController::class, 'DeleteCart'])->name('home.cart.deletecart');
            Route::get('deleteall', [CartController::class, 'DeleteCartALL'])->name('home.cart.deletecartALL');
            Route::post('updatecart', [CartController::class, 'UpdateCart'])->name('home.cart.updatecart');
         // Complete Cart.
            Route::get('sendmail', [CartController::class, 'getviewCheckout'])->name('home.cart.sendmail');
            Route::post('sendmail', [CartController::class, 'SendMail'])->name('home.cart.sendmail');
    });
});