<?php

use App\Http\Controllers\frontend\LinkController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TwoFAController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CropImageController;
use App\Http\Controllers\TypeaheadController;
use App\Http\Controllers\UploadImagesController;
use App\Http\Controllers\PayPalPaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductFeatureController;
use App\Http\Controllers\PharmacyController;




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

Route::get('/signin', [HomeController::class, 'signin'])->name('signin');;
Route::get('/signup', [HomeController::class, 'signup'])->name('signup');


Auth::routes(['verify' => true]);


Route::get('/mysignin', [LinkController::class, 'signin'])->name('mysignin');
Route::get('/mysignup', [LinkController::class, 'signup'])->name('mysignup');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});

Route::group(['middleware' => ['auth']], function () {
    //only verified account can access with this group


    Route::group(['middleware' => 'verified'], function () {
        Route::group(['middleware' => '2fa'], function () {

            Route::get('/home', [HomeController::class, 'index'])->name('home');
            Route::get('/', [HomeController::class, 'index'])->name('index');

            Route::get('/adduser', [UserController::class, 'index'])->name('regUser');
            Route::post('/adduser', [UserController::class, 'addUsers'])->name('addUser');
            Route::get('/edituser/{id}', [UserController::class, 'editUser'])->name('editUser');
            Route::put('/updateuser/{id}', [UserController::class, 'updateUser'])->name('UpdateUser');
            Route::delete('deleteuser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');


            Route::resource('pharmacies', PharmacyController::class);


            Route::get('/viewusers', [HomeController::class, 'viewusers'])->name('viewusers');
            Route::post('/viewusers/search', [HomeController::class, 'viewusers'])->name('Search');
            Route::get('/viewusers/search', [HomeController::class, 'viewusers'])->name('Search');

            Route::get('/roles', [HomeController::class, 'roles'])->name('roles');
            Route::get('/roles/create', [HomeController::class, 'createrole'])->name('createrole');
            Route::put('/roles/create/submit', [HomeController::class, 'rolesubmit'])->name('submitrole');
            Route::get('/roles/edit/{id}', [HomeController::class, 'editrole'])->name('roles.edit');
            Route::get('/roles/show/{id}', [HomeController::class, 'showrole'])->name('roles.show');
            Route::get('/roles/delete/{id}', [HomeController::class, 'deleterole'])->name('roles.delete')->middleware(['role:Admin']);

            Route::resource('products', ProductController::class);

            Route::get('/autocomplete-search', [TypeaheadController::class, 'autocompleteSearch']);

            Route::get('crop-image-upload', [CropImageController::class, 'index']);
            Route::post('/products/crop-image-upload/', [CropImageController::class, 'uploadCropImage']);
            Route::post('/products/{id}/crop-image-upload', [CropImageController::class, 'editCropImage']);

            Route::post('/featureproduct/{id}', [ProductFeatureController::class, 'feature'])->name('feature');

            // Multiple images upload
            Route::get('upload-multiple-image-preview', [UploadImagesController::class, 'index'])->name('addImages');
            Route::post('upload-multiple-image-preview', [UploadImagesController::class, 'store']);

            // Route::get('addproductimages/{code}', view('frontend.layout.addproductimages'))->name('frontend.layout.addproductimages');


            Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
            Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
            Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
            Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
            Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


            //orders
            Route::resource('orders', OrderController::class);


            Route::get('handle-payment', [PaypalPaymentController::class, 'handlePayment'])->name('make.payment');
            Route::get('cancel-payment', [PaypalPaymentController::class, 'paymentCancel'])->name('cancel.payment');
            Route::get('payment-success', [PaypalPaymentController::class, 'paymentSuccess'])->name('success.payment');
        });
    });
});
Route::get('2fa', [TwoFAController::class, 'index'])->name('2fa.index');
Route::post('2fa', [TwoFAController::class, 'store'])->name('2fa.post');
Route::get('2fa/reset', [TwoFAController::class, 'resend'])->name('2fa.resend');
