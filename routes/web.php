<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/books/borrow/{id}', [BookController::class, 'borrow'])->name('books.borrow');
Route::post('/books/borrow/{id}', [BookController::class, 'borrowStore'])->name('books.borrow.store');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/book/create', [AdminController::class, 'createBook'])->name('admin.createBook');
    Route::post('/admin/book', [AdminController::class, 'storeBook'])->name('admin.storeBook');
    Route::get('/admin/category/create', [AdminController::class, 'createCategory'])->name('admin.createCategory');
    Route::post('/admin/category', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
