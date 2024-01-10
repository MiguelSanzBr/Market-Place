<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketProduct;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisteredUserController;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
    Route::delete('/profile/address/delete', [ProfileController::class, 'addresDelete'])->name('address.Delete');
 
   Route::patch('/profile/address/edit', [ProfileController::class, 'addresEdit'])->name('address.Edit');
    
    Route::get('/address', [AddressController::class, 'create'])->name('address')->can('authorize',App\Models\Address::class);
    
    Route::post('/address', [AddressController::class, 'store']);
    
    Route::get('/product', [ProductController::class, 'index'])->name('product.get');
    
    Route::post('/product', [ProductController::class, 'create'])->name('product.post');
});



require __DIR__.'/auth.php';
