<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todos', [TodoController::class, 'index'])->name('todo.index');
Route::get('/todos/create', [TodoController::class, 'create'])->name('todo.create');
Route::post('/todos/store', [TodoController::class, 'store'])->name('todo.store')->middleware('web');
Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::delete('/delete/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
