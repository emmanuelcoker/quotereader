<?php

use Illuminate\Http\Request;
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
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Auth Routes
Route::group(['prefix' => 'auth'], function () {
     Route::post('login',                         [AuthController::class, 'login'])->name('login');
     Route::post('register',                      [AuthController::class, 'register']);
              
});

 Route::group(['middleware' => 'auth:api'], function() {
          
     
      Route::get('logout',                         [AuthController::class, 'logout']);
     //General Routes
          //categories routes
     Route::get('/category/all',        [CategoryController::class, 'allCategories']);
     Route::get('/category/search',     [CategoryController::class, 'findCategory']);
     
          //Quotes routes
     Route::get('/quotes/all',          [QuoteController::class, 'allQuotes']);
     Route::get('/quote/search',         [QuoteController::class, 'findQuote']);
     
     //Authors Routes
     Route::get('/authors/all',         [AuthorController::class, 'allAuthors']);
     Route::get('/author/search',      [AuthorController::class, 'findAuthor']);

          
     //update user profile
     Route::put('/user/{id}',           [UserController::class, 'update']);

     //subscribe to get quotes
     Route::get('/subscribe',           [UserController::class, 'subscribe']);
     Route::get('/unsubscribe',           [UserController::class, 'unsubscribe']);


     //get user notifications
     Route::get('/notifications',       [UserNotificationsController::class, 'allNotifications']);
     Route::get('/notifications/{id}',  [UserNotificationsController::class, 'markNotification']);
     Route::get('/all/notifications',    [UserNotificationsController::class, 'markAllNotifications']);

     //User Favourites
     Route::get('/favourites/all',          [FavouriteController::class, 'myFavourites']);
     Route::post('/favourites/{id}',        [FavouriteController::class, 'addFavourite']);
     Route::delete('/favourites/{id}',      [FavouriteController::class, 'delete']);


     //Admin routes
     Route::group(['prefix' => 'admin'], function(){
          Route::group(['middleware' => 'VerifyAdmin'], function() {
               Route::get('/users',               [UserController::class, 'users']);
               Route::get('/user/{id}',         [UserController::class, 'show']);
                    //create new category
               Route::post('/category',           [CategoryController::class, 'store']);
                    //update category
               Route::put('/category/{id}',       [CategoryController::class, 'update']);
                    //delete category
               Route::delete('/category/{id}',    [CategoryController::class, 'delete']);

                    //create new author
               Route::post('/author/create',      [AuthorController::class, 'create']);
               Route::put('/author/{id}',         [AuthorController::class, 'update']);   


                    //Quotes
               Route::post('/quotes/create',      [QuoteController::class, 'create']);
               Route::put('/quotes/{id}',         [QuoteController::class, 'update']);
               Route::delete('/quotes/{id}',      [QuoteController::class, 'delete']);


               //Favourites
               //get all likes with count
               Route::get('/favourites/all',      [FavouriteController::class, 'allFavourites']);

          });   
     });
});



