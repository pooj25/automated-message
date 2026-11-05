<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\CustomerController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);

Route::resource('suppliers', SupplierController::class);

Route::resource('purchases', PurchaseController::class)
    ->only(['index', 'create', 'store', 'show']);

Route::resource('customers', CustomerController::class);

Route::get('/test-whatsapp', function (\Illuminate\Http\Request $request, \App\Services\WhatsAppService $whatsapp) {
    $phone = $request->query('phone', config('services.openwa.recipient'));
    $msg = $request->query('msg', "👋 Hello Sir! This is an automated test message sent from my CRUD Application via self-hosted OpenWA API gateway.");
    
    $res = $whatsapp->sendMessage($msg, $phone);
    return response()->json([
        'status' => $res['success'] ? 'SUCCESS' : 'PENDING/FAILED',
        'target_phone' => $phone,
        'response' => $res
    ]);
})->name('test.whatsapp');