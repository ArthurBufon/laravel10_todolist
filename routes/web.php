<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TaskController::class, 'index'])->name('dashboard');
Route::get('/get_tasks', [TaskController::class, 'list'])->name('get_tasks');
Route::get('/task/create', [TaskController::class, 'create'])->name('task_create');
Route::post('/task/store', [TaskController::class, 'store'])->name('task_store');
Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('task_edit');
Route::post('/task/delete', [TaskController::class, 'delete'])->name('task_delete');
Route::post('/task/concluir', [TaskController::class, 'concluir'])->name('task_concluir');
