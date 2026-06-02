
<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return "Hello Laravel!";
// });

Route::get('/UserController1', [UserController::class, 'UserController1'])->name('UserController1');
//Route::resource('books', BookController::class);

Route::get('/trash',[BookController::class,'trash']);

Route::get('/restore/{id}',[BookController::class,'restore']);

Route::get('/force-delete/{id}',[BookController::class,'forceDelete']);

Route::middleware('check.login')->group(function () {

    Route::get('/books', [BookController::class,'index']);
    Route::get('/books/{book}', [BookController::class,'show']);

    Route::middleware('admin')->group(function () {

        Route::get('/lists', [BookController::class,'create']);
        Route::post('/store', [BookController::class,'store']);
        Route::get('/books/{book}/edit', [BookController::class,'edit']);
        Route::put('/books/{book}', [BookController::class,'update']);
        Route::delete('/books/{book}', [BookController::class,'destroy']);

    });
});


Route::get('/login',[AuthController::class,'showLogin']);
Route::post('/login',[AuthController::class,'login']);

Route::get('/logout',[AuthController::class,'logout']);

Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/register',[AuthController::class,'register']);



