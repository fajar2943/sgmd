<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\VoucherController;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [SiteController::class, 'index']);
Route::get('/voucher', [SiteController::class, 'voucher']);
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/checkout/{name}', [SiteController::class, 'checkout']);
Route::post('/order', [SiteController::class, 'order']);
Route::get('/invoice/{code}', [SiteController::class, 'invoice'])->name('invoice');
Route::get('/cancel/{code}', [SiteController::class, 'cancel']);
Route::get('/time', function(){
    return Order::whereStatus('Expired')->get('id');
});

Route::prefix('admin')->group(function(){
    Route::group(['middleware' => ['auth', 'CheckRoles:Super,Admin']], function () {
        Route::get('', [DashboardController::class, 'index']);
        Route::resource('orders', OrderController::class);
        Route::resource('vouchers', VoucherController::class);
        Route::post('vouchers/import', [VoucherController::class, 'import']);
        Route::resource('imports', ImportController::class);
        Route::resource('plans', PlanController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('settings', SettingController::class);
        Route::post('settings/password', [SettingController::class, 'password']);
        Route::resource('payments', PaymentController::class);
        Route::get('set-payment/{payment}', [PaymentController::class, 'setPayment']);
        Route::post('search', function(Request $request){
            return redirect('/admin/orders?inv='.$request->inv);
        });
        Route::delete('logout', [AuthController::class, 'logout']);
    });
});
