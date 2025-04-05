<?php

use App\Http\Controllers\Book\CreateController;
use App\Http\Controllers\Book\DestroyController;
use App\Http\Controllers\Book\EditController;
use App\Http\Controllers\Book\IndexController;
use App\Http\Controllers\Book\ShowController;
use App\Http\Controllers\Book\StoreController;
use App\Http\Controllers\Book\UpdateController;
use App\Http\Controllers\Book\RestoreController;
use App\Http\Controllers\Book\TrashController;
use App\Http\Controllers\User\AccessController;
use App\Http\Controllers\User\ListController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\StartpageController::class, 'index'])->name('first_page');

Route::group([], function () {
    Route::get('/books', IndexController::class)->name('books.index');
    Route::get('/books/create', CreateController::class)->name('books.create');
    Route::post('/books', StoreController::class)->name('books.store');
    Route::get('/books/{book}', ShowController::class)->name('books.show');
    Route::get('books/{book}/edit', EditController::class)->name('books.edit');
    Route::patch('books/{book}', UpdateController::class)->name('books.update');
    Route::delete('books/{book}', DestroyController::class)->name('books.destroy');
    Route::post('books/{book}/restore', RestoreController::class)->name('books.restore');
    Route::get('books/some/trash', TrashController::class)->name('books.trash');
});

Route::get('/users', ListController::class)->name('users.index');
Route::get('/users/access', AccessController::class)->name('users.access');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

