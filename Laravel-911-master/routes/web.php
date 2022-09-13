<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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




Route::get(
    '/',
    [MainController::class, 'index']
)->name('home');
Route::get('/category/{category:slug}', [MainController::class, 'category'])->name('category');
Route::get('/article/{article:slug}', [MainController::class, 'article'])->name('article');
Route::post('/comments/{article:slug}', [CommentController::class, 'store'])->name('postcomment');
Route::resource('comments', CommentController::class);

require __DIR__ . '/auth.php';

Route::prefix('administrator')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/articles', ArticleController::class);
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});