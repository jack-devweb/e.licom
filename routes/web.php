<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('/categories/search', [CategoryController::class, 'search'])->name('categories.search');
//Une route pour afficher les détails d'un produit en particulier
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');
//Une route pour ajouter un produit au panier
Route::post('/cart', 'CartController@store')->name('cart.store');
//Une route pour afficher le contenu du panier
Route::get('/cart', 'CartController@index')->name('cart.index');
//Une route pour supprimer un produit du panier
Route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy');
//Une route pour passer une commande
Route::post('/checkout', 'OrderController@store')->name('checkout.store');
Route::get('/', function () {
    return view('welcome');
});
