<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserNotificationsController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\FavouriteController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::post('login',                         [AuthController::class, 'login'])->name('login');
// Route::post('register',                      [AuthController::class, 'register']);
     
Auth::routes();
Route::get('/',     [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 //Admin routes
     Route::group(['prefix' => 'admin'], function(){
          Route::group(['middleware' => 'VerifyAdmin'], function() { 
               Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
               Route::get('/',     [App\Http\Controllers\HomeController::class, 'index'])->name('home');
               
               Route::get('/users',               [UserController::class, 'users']);
               Route::get('/user/{id}',           [UserController::class, 'show']);

               Route::get('/categories/all',      [CategoryController::class, 'allCategories']);
                    //create new category
               Route::post('/category',           [CategoryController::class, 'store']);
                    //update category
               Route::put('/category/{id}',       [CategoryController::class, 'update']);
                    //delete category
               Route::delete('/category/{id}',    [CategoryController::class, 'delete']);

                    //create new author
               Route::get('/author/all',          [AuthorController::class, 'allAuthors']);
               Route::put('/author/{id}',         [AuthorController::class, 'update']);   


                    //Quotes
               Route::get('/quotes/all',          [QuoteController::class, 'allQuotes']);
               Route::post('/quotes/create',      [QuoteController::class, 'create']);
               Route::put('/quotes/{id}',         [QuoteController::class, 'update']);
               Route::delete('/quotes/{id}',      [QuoteController::class, 'delete']);


               //Favourites
               //get all likes with count
               Route::get('/favourites/all',      [FavouriteController::class, 'allFavourites']);
              
          });   
     });



