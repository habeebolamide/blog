<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'index'])->middleware(['auth'])->name('index');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->middleware(['auth'])->name('index');
    Route::post('/create', [BlogController::class, 'create'])->middleware(['auth'])->name('create');
    Route::get('/getblogs', [BlogController::class, 'getblogs'])->middleware(['auth'])->name('getblogs');
    Route::get('/details/{blog_id}', [BlogController::class, 'details'])->middleware(['auth'])->name('details');
});

require __DIR__.'/auth.php';
