<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CKEditorController;
// use App\Http\Controllers\authorController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CekUserLogin;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

// Route::get('login', [LoginController::class, 'index'])->name('login');
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
});

// Route::group(['middleware' => ['auth']], function () {
//     Route::group(['middleware' => ['CekUserLogin:admin']], function () {
//         Route::get('admin/dashboard', [AdminController::class, 'home']);
//     });
//     // Route::group(['middleware' => ['CekUserLogin:author']], function () {
//     //     Route::resource('author', author::class);
//     // });
// });

Route::prefix('admin')->middleware(['auth', 'CekUserLogin:admin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'home']);

    Route::get('categories', [AdminController::class, 'viewcategories'])->name('category');

    // category
    Route::get('/data/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/data/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/data/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');

    // article
    Route::get('articles', [AdminController::class, 'viewarticle'])->name('article');
    Route::get('add-article', [ArticleController::class, 'index']);
    Route::post('article-store', [ArticleController::class, 'store'])->name('articles.store');
    Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');
});
