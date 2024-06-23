<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\GuestController;
// use App\Http\Controllers\authorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ToggleController;
use App\Http\Middleware\CekUserLogin;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollection;

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



Route::get('/', [GuestController::class, 'index'])->name('index');
Route::get('/categories/{category}', [GuestController::class, 'show']);
Route::get('/categories', [GuestController::class, 'all']);
Route::post('/register/proses', [RegisterController::class, 'register'])->name('register.go');
// route for page
Route::get('/news/{slug}', [GuestController::class, 'page_slug'])->name('guest.slug');

Route::post('/toggle-theme', [ToggleController::class, 'toggleTheme'])->name('toggle.theme');
// route for ajax to get data
Route::get('/data-article/{slug}', [GuestController::class, 'getArticleBySlug'])->name('article.slug');
Route::get('/data-article/others/{slug}', [GuestController::class, 'getOtherArticles'])->name('articles.others');

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');
    Route::get('register', 'register');
});


Route::prefix('admin')->middleware(['auth', 'CekUserLogin:admin'])->group(function () {
    // route view admin
    Route::get('dashboard', [AdminController::class, 'home']); //
    Route::get('categories', [AdminController::class, 'viewcategories'])->name('category'); //
    Route::get('articles', [AdminController::class, 'viewarticle'])->name('article'); //
    // user
    Route::get('user-control', [AdminController::class, 'viewAccount'])->name('userAccount'); //

    // Data User
    Route::get('/users/data', [RegisterController::class, 'getData'])->name('users.data');
    Route::get('/users/{id}/delete', [RegisterController::class, 'update']);

    // category
    Route::get('/data/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/data/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/data/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');

    // Data Category
    Route::get('/categories/data', [CategoryController::class, 'getData'])->name('category.data');

    // article
    Route::get('add-article', [ArticleController::class, 'index']); //add article
    Route::post('article-store', [ArticleController::class, 'store'])->name('articles.store');
    Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');
    Route::get('/article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/{id}/update', [ArticleController::class, 'update'])->name('article.update');
    Route::get('/article/{id}/delete', [ArticleController::class, 'delete'])->name('article.delete');

    // Data Article Ajax
    Route::get('/article/data', [ArticleController::class, 'getData'])->name('article.data');

    // tags
    Route::get('/tags', [TagController::class, 'index'])->name('tags');
    Route::post('/tags-store', [TagController::class, 'store'])->name('tags.store');
    Route::post('/tags/{id}/delete', [TagController::class, 'delete'])->name('tags.delete');
    Route::get('/tags/{id}/edit', [TagController::class, 'edit'])->name('tags.edit');
    Route::put('/tags/{id}/update', [TagController::class, 'update'])->name('tags.update');

    // Data Tags Ajax
    Route::get('/tags/data', [TagController::class, 'getData'])->name('tags.data');
});

Route::middleware(['auth', 'CekUserLogin:author'])->group(function () {
    Route::get('dashboard', [AuthorController::class, 'index']);
    Route::get('article', [AuthorController::class, 'viewArticle'])->name('author.view.article');
    Route::get('add-article', [AuthorController::class, 'viewAddArticle']);
    Route::post('article-store', [AuthorController::class, 'store'])->name('author.store.article');
    Route::get('/article/{id}/edit', [AuthorController::class, 'edit'])->name('author.edit.article');
    Route::put('/article/{id}/update', [AuthorController::class, 'update'])->name('author.update.article');
    Route::get('/article/{id}/delete', [AuthorController::class, 'delete'])->name('author.delete.article');
    // Data Article Ajax
    Route::get('/my-data', [AuthorController::class, 'getData'])->name('article.author');
});
