<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemosController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('memo')->group(function () {
    Route::get('/new', [MemosController::class, 'create'])->name('create');
    Route::get('/list/{user_id?}', [MemosController::class, 'list'])->name('list');
    Route::post('/list/{user_id?}', [MemosController::class, 'list'])->name('list');

    Route::post('/store', [MemosController::class, 'store'])->name('store');
    require __DIR__.'/auth.php';
});
