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

Route::prefix('memo')->name('memo.')->group(function () {
    Route::get('/new', [MemosController::class, 'create'])->name('memo.create');
    Route::get('/list', [MemosController::class, 'list'])->name('memo.list');
    Route::get('/edit/{memo_id}', [MemosController::class, 'edit'])->name('memo.edit');

    Route::post('/edit/{memo_id}', [MemosController::class, 'edit'])->name('memo.edit');
    Route::post('/store', [MemosController::class, 'store'])->name('memo.store');
    Route::post('/update', [MemosController::class, 'update'])->name('memo.update');
    require __DIR__ . '/auth.php';
});
