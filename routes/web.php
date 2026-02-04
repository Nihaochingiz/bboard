<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BbsController;
use App\Http\Controllers\HomeController;

Route::get('/', [BbsController::class, 'index'])->name ('index');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/create', [HomeController::class, 'create'])->name('bb.create');
Route::post('/home', [HomeController::class, 'store'])->name('bb.store');
Route::get('/home/{bb}/edit', [HomeController::class, 'edit'])->name('bb.edit');
Route::patch('/home/{bb}', [HomeController::class, 'update'])
->name('bb.update');
Route::get('/home/{bb}/delete', [HomeController::class, 'delete'])
->name('bb.delete');
Route::delete('/home/{bb}', [HomeController::class, 'destroy'])
->name('bb.destroy');
Route::get('/{bb}/', [BbsController::class, 'detail'])->name('detail');
