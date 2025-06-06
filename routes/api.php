<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Book\DestroyController;
use App\Http\Controllers\Book\IndexController;
use App\Http\Controllers\Book\RestoreController;
use App\Http\Controllers\Book\ShowController;
use App\Http\Controllers\Book\StoreController;
use App\Http\Controllers\Book\TrashController;
use App\Http\Controllers\Book\UpdateController;
use App\Http\Controllers\BookSearch\ResultController;
use App\Http\Controllers\Library\AdmissionController;
use App\Http\Controllers\User\ListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function() {
    return response()->json(['message' => 'API работает!']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['middleware'=> 'jwt.auth'], function () {
    Route::get('/books', IndexController::class);
    Route::post('/books', StoreController::class);
    Route::get('/books/{book}', ShowController::class);
    /*Route::patch('books/{book}', UpdateController::class);

    patch method is not supported by postman form-data,
    when you need to add .txt file,
    so for update uses post

    */
    Route::post('books/{book}', UpdateController::class);
    Route::delete('books/{book}', DestroyController::class);
    Route::post('books/{book}/restore', RestoreController::class);
    Route::get('books/some/trash', TrashController::class);
});

Route::group(['middleware'=> 'jwt.auth'], function () {
    Route::get('/users', ListController::class);
    Route::post('/users/access', [AdmissionController::class, 'grantAccessById']);
    Route::get('/users/show/{user}', [AdmissionController::class, 'showUserLibrary']);
});

Route::group(['middleware'=> 'jwt.auth'], function () {
    Route::get('/search-books/{query}', [ResultController::class, 'searchAndSaveBooks']);
});
