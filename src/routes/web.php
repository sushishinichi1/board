<?php

use App\Http\Controllers\BoardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/board')->group(function () {
    Route::get('/',[BoardController::class, 'view'])->name('board.view');
    Route::get('/create', [BoardController::class, 'create'])->name('board.create');
    Route::post('/store', [BoardController::class, 'store'])->name('board.store');
    Route::get('/show/{id}', [BoardController::class, 'show'])->name('board.show');
    Route::get('/edit/{id}', [BoardController::class, 'edit'])->name('board.edit');
    Route::put('/update/{board}', [BoardController::class, 'update'])->name('board.update');
    Route::delete('/destroy/{board}', [BoardController::class, 'destroy'])->name('board.destroy');
});