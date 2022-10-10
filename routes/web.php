<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;

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

Route::get('/', [ListController::class, 'index'])->name('home');
Route::get('add', [ListController::class, 'add'])->name('add');
Route::post('create', [ListController::class, 'create'])->name('create');

Route::get('view/{id}', [ListController::class, 'view'])->name('view');
Route::get('edit/{id}', [ListController::class, 'edit'])->name('edit');
Route::post('update', [ListController::class, 'update'])->name('update');
Route::get('delete/{id}', [ListController::class, 'delete'])->name('delete');

Route::post('multiple-delete', [ListController::class, 'multipleDelete'])->name('multiple-delete');

