<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BbsController;

Route::get('/', [BbsController::class, 'index']);
Route::get('/{id}/', [BbsController::class, 'detail'])->where('id', '[0-9]+');

