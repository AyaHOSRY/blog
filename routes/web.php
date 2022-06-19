<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::group(['middleware'=>['web']], function (){
    //authentication
    //Route::auth();
    Route::get('auth/login',[AuthController::class,'getLogin'])->name('login');
    Route::post('auth/login',[AuthController::class,'postLogin']);
    Route::get('auth/logout',[AuthController::class,'petLogout'])->name('logout');

    //registration routes
    Route::get('auth/register',[AuthController::class,'getRegister']);
    Route::post('auth/register',[AuthController::class,'postRegister']);

    // Password Reset Routes
	Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
	Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	Route::post('password/reset', 'Auth\PasswordController@reset');


   // domain.com/blog/slug-goes-here
    Route::get('blog/{slug}',[BlogController::class,'getSingle'])->where('slug','[\w\d\-\_]+')->name('blog.single');
    Route::get('blog',[BlogController::class,'getArchive'])->name('blog.index');
    Route::resource('posts',PostController::class);
    ////
    Route::get('/home',[PagesController::class , 'index'])->name('pages.home');
    
    Route::get('/about',[PagesController::class , 'getAbout'])->name('pages.about');
    Route::get('/contact',[PagesController::class , 'getContact'])->name('pages.contact');
    Route::post('/contact',[PagesController::class , 'postContact']);

    //categoris 
    Route::resource('categories',CategoryController::class);
    Route::resource('tags',TagController::class);
    //comments
    //Route::resource('comments',CommentController::class);
   Route::post('comments/{post_id}',[CommentController::class, 'store'])->name('comments.store');
   Route::delete('comments/{id}/{post_id}',[CommentController::class, 'destroy'])->name('comments.destroy');
   Route::get('comments/{id}/delete',[CommentController::class, 'delete'])->name('comments.delete');
   


});
/*Route::group(['middleware' => ['guest']], function() {
    /**
     * Register Routes
     */
    //Route::get('/register', [RegisterController::class,'show'])->name('register.show');
    //Route::post('/register', [RegisterController::class,'register'])->name('register.perform');

    /**
     * Login Routes
     */
    //Route::get('/login', [LoginController::class,'show'])->name('login.show');
   // Route::post('/login', [LoginController::class,'login'])->name('login.perform');
//
//});

//Route::group(['middleware' => ['auth']], function() {
    /**
     * Logout Routes
     */
   // Route::get('/logout', [LogoutController::class,'perform'])->name('logout.perform');
//});*/


