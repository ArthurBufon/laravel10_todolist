<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TaskController::class, 'index'])->name('dashboard');
Route::get('/task/create', [TaskController::class, 'create'])->name('task_create');
Route::post('/task/store', [TaskController::class, 'store'])->name('task_store');
Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('task_edit');
Route::post('/task/delete/{id}', [TaskController::class, 'delete'])->name('task_delete');
