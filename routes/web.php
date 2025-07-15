<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;

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

// Index
Route::get('/', [DashboardController::class, 'start'])->name('index');

// Authentication 
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Medicines 
Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index');
Route::get('/medicines/create', [MedicineController::class, 'create'])->name('medicines.create');
Route::post('/medicines', [MedicineController::class, 'store'])->name('medicines.store');
Route::post('/medicines/show', [MedicineController::class, 'show'])->name('medicines.show');
Route::post('/medicines/edit', [MedicineController::class, 'edit'])->name('medicines.edit');
Route::post('/medicines/update', [MedicineController::class, 'update'])->name('medicines.update');
Route::post('/medicines/delete', [MedicineController::class, 'destroy'])->name('medicines.destroy');

// Suppliers 
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::post('/suppliers/show', [SupplierController::class, 'show'])->name('suppliers.show');
Route::post('/suppliers/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
Route::post('/suppliers/update', [SupplierController::class, 'update'])->name('suppliers.update');
Route::post('/suppliers/delete', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

// Customers 
Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
Route::post('/customers/show', [App\Http\Controllers\CustomerController::class, 'show'])->name('customers.show');
Route::post('/customers/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
Route::post('/customers/update', [App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
Route::post('/customers/delete', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.destroy');

// Users 
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::post('/users/show', [UserController::class, 'show'])->name('users.show');
Route::post('/users/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/update', [UserController::class, 'update'])->name('users.update');
Route::post('/users/delete', [UserController::class, 'destroy'])->name('users.destroy');

// Sales 
Route::get('/sales', [App\Http\Controllers\SaleController::class, 'index'])->name('sales.index');
Route::get('/sales/create', [App\Http\Controllers\SaleController::class, 'create'])->name('sales.create');
Route::post('/sales', [App\Http\Controllers\SaleController::class, 'store'])->name('sales.store');
Route::post('/sales/show', [App\Http\Controllers\SaleController::class, 'show'])->name('sales.show');
Route::post('/sales/delete', [App\Http\Controllers\SaleController::class, 'destroy'])->name('sales.destroy');

// Purchases 
Route::get('/purchases', [App\Http\Controllers\PurchaseController::class, 'index'])->name('purchases.index');
Route::get('/purchases/create', [App\Http\Controllers\PurchaseController::class, 'create'])->name('purchases.create');
Route::post('/purchases', [App\Http\Controllers\PurchaseController::class, 'store'])->name('purchases.store');
Route::post('/purchases/show', [App\Http\Controllers\PurchaseController::class, 'show'])->name('purchases.show');
Route::post('/purchases/edit', [App\Http\Controllers\PurchaseController::class, 'edit'])->name('purchases.edit');
Route::post('/purchases/update', [App\Http\Controllers\PurchaseController::class, 'update'])->name('purchases.update');
Route::post('/purchases/delete', [App\Http\Controllers\PurchaseController::class, 'destroy'])->name('purchases.delete');