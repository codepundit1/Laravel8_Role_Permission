<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

require __DIR__.'/auth.php';

Route::resource('posts', PostController::class)->except('show');
// Route::get('posts/trash', [ResortController::class, 'trash'])->name('posts.trash');
// Route::get('posts-restore/{id}', [ResortController::class, 'restore'])->name('posts.restore');
// Route::get('posts-force-delete/{id}', [ResortController::class, 'force_delete'])->name('posts.force-delete');

Route::get('posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::get('posts/{id}/force-delete', [PostController::class, 'forceDelete'])->name('posts.force-delete');

