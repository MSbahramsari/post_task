<?php

use Illuminate\Support\Facades\Route;

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
    return redirect(\route('blog.index'));
});
Route::view('/show', 'blog.show')->name('blog.show');
Route::get('/blogs', [\App\Http\Controllers\PostController::class, 'index'])->name('blog.index');
Route::get('/blogs/create', [\App\Http\Controllers\PostController::class, 'create'])->name('blog.create');
Route::post('/blogs', [\App\Http\Controllers\PostController::class, 'store'])->name('blog.store');
Route::any('/blogs/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('blog.show');
Route::get('/blogs/{id}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('blog.edit');
Route::any('/blogs/{id}', [\App\Http\Controllers\PostController::class, 'update'])->name('blog.update');
Route::any('/blogs/{id}/delete', [\App\Http\Controllers\PostController::class, 'destroy'])->name('blog.destroy');
