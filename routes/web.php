<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use app\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Connexion\LogController;
use App\Http\Controllers\Admin\CategoryController;

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
//("/inscription/page" = La route en question)
//("[LogController::class, ...]" = La classe dans laquel la fonction est traiter)
//("[..., "inscription"] = inscription designe le nom de lq fonction dans laquel la les action sont gere : exple = ajout, edition, listing,...)
//("inscrption.page" = c'est le nom de la route. le nom nom qui fais reference ala route. Elle sera utiliser pour naviguer vers d'autre page et pour preciser dans quel fonction on dois traiter certaines action)

Route::get("/",[AppController::class, "index"])->name("app.index");

Auth::routes();

//Inscription
Route::get('/inscription',[LogController::class, "inscription"])->name("inscrption.page");
Route::post('/inscription',[LogController::class, "inscription_action"])->name("inscription.action");

//Connexion
Route::get('/connexion',[LogController::class, "connexion"])->name("connexion.page");
Route::post('/connexion',[LogController::class, "connexion_action"])->name("connexion.action");

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Tableau de bord principal
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Gestion des utilisateurs
    Route::get('/my-account', [UserController::class, 'index'])->name('users.index');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Gestion des produits
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Gestion des catégories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Gestion des commandes
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

    
});

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
