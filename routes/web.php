<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\SoialLoginController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

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



require __DIR__ . '/auth.php';

Route::get('auth/{provider}/redirect', [SoialLoginController::class, 'redirect'])
    ->name('auth.socilaite.redirect');
Route::get('auth/{provider}/callback', [SoialLoginController::class, 'callback'])
    ->name('auth.socilaite.callback');

//route front

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/post/{id}/show', [HomeController::class, 'show'])->name('front.post.show');
    Route::get('/contact', [HomeController::class, 'showContact'])->name('front.showContact');
    Route::get('/bolg', [HomeController::class, 'showBlog'])->name('front.showBlog');
});

//route dashboard
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth','web', 'verified','checkStatis']
    ],
    function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        //Categore Route
        Route::resource('category', CategoryController::class)->names('category')->except('show');
        Route::get('/category/trash', [CategoryController::class, 'trash'])->name('category.trash');
        Route::get('/category/{id}/restore', [CategoryController::class, 'restore'])->name('category.restore');
        Route::get('/category/restore-all', [CategoryController::class, 'restoreAll'])->name('category.restoreAll');
        Route::delete('/category/{id}/force-delete', [CategoryController::class, 'forceDelete'])->name('category.forceDelete');
        //Post Route
        Route::resource('post', PostController::class)->names('post')->except('show');
        Route::get('/post/trash', [PostController::class, 'trash'])->name('post.trash');
        Route::get('/post/{id}/restore', [PostController::class, 'restore'])->name('post.restore');
        Route::get('/post/restore-all', [PostController::class, 'restoreAll'])->name('post.restoreAll');
        Route::delete('/post/{id}/force-delete', [PostController::class, 'forceDelete'])->name('post.forceDelete');
        //User Route
        Route::resource('user', UserController::class)->names('user')->except('show');
        Route::get('/user/trash', [UserController::class, 'trash'])->name('user.trash');
        Route::get('/user/{id}/restore', [UserController::class, 'restore'])->name('user.restore');
        Route::get('/user/restore-all', [UserController::class, 'restoreAll'])->name('user.restoreAll');
        Route::delete('/user/{id}/force-delete', [UserController::class, 'forceDelete'])->name('user.forceDelete');
        //ٍSetting Route
        Route::get('setting/edit',[SettingController::class,'edit'])->name('settings');
        Route::put('setting/{setting}/update',[SettingController::class,'update'])->name('setting.update');
        //config
        Route::get('settings', [ConfigController::class, 'create'])->name('settings');
        Route::post('settings', [ConfigController::class, 'store']);

    }


);
