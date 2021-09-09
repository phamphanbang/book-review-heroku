<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController as HomePageController1;
use App\Http\Controllers\BookController as BookController1;
use App\Http\Controllers\ReviewController as ReviewController1;
use App\Http\Controllers\CommentController as CommentController1;
use App\Http\Controllers\ProfileController as ProfileController1;
use App\Http\Controllers\UserController as UserController1;
use App\Http\Controllers\CategoryController as CategoryController2;

use App\Http\Controllers\Admin\HomeController as HomeController1;
use App\Http\Controllers\Admin\BookController as BookController2;
use App\Http\Controllers\Admin\CategoryController as CategoryController1;
use App\Http\Controllers\Admin\UserController as UserController2;
use App\Http\Controllers\Admin\ProfileController as ProfileController2;
use App\Http\Controllers\Admin\CartController as CartController2;
use App\Http\Controllers\Admin\LoginController as LoginController2;

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChangeController as ChangeController1;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TagController as UserTagController;

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


Route::get('/', [HomePageController1::class, 'index'])->name('index');

Route::middleware(['auth'])->group(function () {
    Route::resource('activity', ActivityController::class);
});

Route::get('language/{language}', [App\Http\Controllers\LanguageController::class, 'language'])->name('language.index');
Route::resource('review', ReviewController1::class)->only('show');
Route::resource('book', BookController1::class);
Route::resource('home', HomePageController1::class);
Route::resource('categoryuser', CategoryController2::class);
Route::resource('comment', CommentController1::class)->only('show');
Auth::routes();
Route::get('search', [BookController1::class, 'search'])->name('search');



Route::middleware(['users'])->group(function () {
    Route::get('addreview/{id}', [BookController1::class, 'addreview'])->name('add.review');
    Route::resource('review', ReviewController1::class)->except('show');
    Route::resource('profile', ProfileController1::class);
    Route::resource('comment', CommentController1::class)->except('show');
    Route::get('profile/favoritebook/{id}', [ProfileController1::class, 'favoriteBook'])->name('profile.favorite');
    Route::get('checkout', [CartController::class, 'checkout']);
    Route::get('profile/ratebook/{id}', [ProfileController1::class, 'rateBook'])->name('profile.ratebook');
    Route::get('profile/timeline/{id}', [ActivityController::class, 'show'])->name('profile.timeline');
    Route::put('change_password', [ChangeController1::class, 'changePassword'])->name('change.password');
    Route::put('change_image', [ChangeController1::class, 'changeImage'])->name('change.image');
    Route::get('listuser', [ProfileController1::class, 'listuser'])->name('listuser');
    Route::get('like/review/{reviewid}', [ReviewController1::class, 'likereview'])->name('like.review');
    Route::get('unlike/review/{reviewid}', [ReviewController1::class, 'unlikereview'])->name('unlike.review');
    Route::get('like/comment/{commentid}', [CommentController1::class, 'likecomment'])->name('like.comment');
    Route::get('unlike/comment/{commentid}', [CommentController1::class, 'unlikecomment'])->name('unlike.comment');
    Route::get('latestCart', [CartController::class, 'latestCart']);
    Route::get('follow/{userid}/{followid}', [UserController1::class, 'follow'])->name('follow');
    Route::get('unfollow/{userid}/{followid}', [UserController1::class, 'unfollow'])->name('unfollow');
    Route::resource('timeline', ActivityController::class);
    Route::resource('cart', CartController::class);
    Route::resource('cartItem', CartItemController::class);
    Route::get('current_cart', [CartController::class, 'currentCart']);
    Route::get('cancel/{id}', [CartController::class, 'cancel']);
    Route::post('report/{id}', [ReportController::class, 'report'])->name('report');
    Route::resource('tag', UserTagController::class);
});


Route::resource('timeline', ActivityController::class);


Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::resource('homeadmin', HomeController1::class);
    Route::resource('bookadmin', BookController2::class);
    Route::resource('category', CategoryController1::class);
    Route::resource('user', UserController2::class);
    Route::resource('profileadmin', ProfileController2::class);
    Route::post('search/user', [UserController2::class, 'search'])->name('admin.user.search');
    Route::resource('cart', CartController2::class);
    Route::get('cart/type/{type}', [CartController2::class, 'cartType'])->name('admin.cart.type');
    Route::get('buybook', [UserController2::class, 'buybook']);
    Route::get('logout', [LoginController2::class, 'logout'])->name('admin.logout');
    Route::get('category/{categoryid}/delete', [CategoryController1::class, 'destroy'])->name('deletecategory');
    Route::get('book/{bookid}/delete', [BookController2::class, 'destroy'])->name('deletebook');
    Route::get('cart/{id}/delete', [CartController2::class, 'destroy'])->name('deletecart');
    Route::get('user/{id}/delete', [UserController2::class, 'destroy'])->name('deleteuser');
    Route::get('export/carts', [ExcelController::class, 'cartAll']);
    Route::get('export/revenue', [ExcelController::class, 'revenue']);
    Route::get('export/tag', [ExcelController::class, 'tag']);
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('tag', TagController::class);
    Route::get('role/{id}/delete', [RoleController::class, 'destroy']);
    Route::get('permission/{id}/delete', [PermissionController::class, 'destroy']);
    Route::get('tag/{id}/delete', [TagController::class, 'destroy']);
});
Route::get('admin/login', [LoginController2::class, 'index'])->name('admin.index');
Route::post('admin/login', [LoginController2::class, 'postLogin'])->name('admin.login');
Route::get('redirect/{driver}', [LoginController::class, 'redirectToProvider'])
    ->name('login.provider');
Route::get('auth/{driver}/callback', [LoginController::class, 'handleProviderCallback'])
    ->name('login.callback');
