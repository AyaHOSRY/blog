<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [PagesController::class , 'index']);


Route::group(['middleware'=>['web']], function (){
    
   // domain.com/blog/slug-goes-here
    Route::get('blog/{slug}',[BlogController::class,'getSingle'])->where('slug','[\w\d\-\_]+')->name('blog.single');
    Route::get('blog',[BlogController::class,'getArchive'])->name('blog.index');
    Route::resource('posts',PostController::class);
    //Route::get('/home',[PagesController::class , 'index'])->name('pages.home');
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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
