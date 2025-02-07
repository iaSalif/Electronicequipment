<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Connexion\LogController;
use App\Http\Controllers\Admin\CategoryController;

/*
|----------------------------------------------------------------------
| Public Routes
|----------------------------------------------------------------------
*/
Route::get('/', [AppController::class, 'index'])->name('app.index');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/product/{slug}', [ShopController::class, 'productDetails'])->name('shop.product.details');

// Inscription
Route::get('/inscription', [LogController::class, 'inscription'])->name('inscription.page');
Route::post('/inscription', [LogController::class, 'inscription_action'])->name('inscription.action');

// Connexion / Authentification
Route::get('/connexion', [AuthController::class, 'loginForm'])->name('connexion.page');
Route::post('/connexion', [AuthController::class, 'login'])->name('connexion.action');
Route::post('/deconnexion', [AuthController::class, 'logout'])->name('deconnexion');

/*
|----------------------------------------------------------------------
| Routes sécurisées pour les administrateurs
|----------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Tableau de bord principal
    Route::get('/', [AdminController::class, 'index'])->name('index');

    // Gestion des utilisateurs
    Route::resource('users', UserController::class)->except(['show']);
    Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');

    // Gestion des produits(Listing, Add, Edit, Destroy)
    
    // Gestion des catégories
    Route::resource('categories', CategoryController::class);
    
    // Gestion des commandes
    Route::resource('orders', OrderController::class)->only(['index', 'show']);
    Route::put('orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});

/*
|----------------------------------------------------------------------
| Authentification Laravel par défaut
|----------------------------------------------------------------------
*/
Auth::routes();

// Page Home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/connexion', [AuthController::class, 'loginForm'])->name('connexion');
Route::post('/connexion', [AuthController::class, 'login'])->name('connexion.post');
Route::post('/deconnexion', [AuthController::class, 'logout'])->name('deconnexion');
Route::resource('products', ProductController::class);
