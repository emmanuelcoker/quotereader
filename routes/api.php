<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserAuthController;
use App\Http\Controllers\Api\UserProfileController;
use App\Http\Controllers\Api\UserNotificationsController;
use App\Http\Controllers\Api\UserQuoteController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\Api\UserCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Api\UserAuthorController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\Api\UserFavouriteController;
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
     Route::post('login',                         [UserAuthController::class, 'login'])->name('login');
     Route::post('register',                      [UserAuthController::class, 'register']);
});

Route::middleware(['auth:api'])->group(function () {
          
      Route::get('logout',                        [UserAuthController::class, 'logout']);
     //General Routes
     //categories routes
     Route::get('/category/all',                  [UserCategoryController::class, 'allCategories']);
     Route::post('/category/search',              [UserCategoryController::class, 'findCategory']);
     
          //Quotes routes
     Route::get('/quotes/all',                    [UserQuoteController::class, 'allQuotes']);
     Route::get('/quote/search',                  [UserQuoteController::class, 'findQuote']);

     
     //Authors Routes
     Route::get('/authors/all',                   [UserAuthorController::class, 'allAuthors']);
     Route::post('/author/search',                 [UserAuthorController::class, 'findAuthor']);

          
     //update user profile
     Route::get('/user',  function(){
          return auth()->user();
     });
     Route::put('/user',                          [UserProfileController::class, 'update']);

     //subscribe to get quotes
     Route::get('/subscribe',                     [UserProfileController::class, 'subscribe']);
     Route::get('/unsubscribe',                   [UserProfileController::class, 'unsubscribe']);


     //get user notifications
     Route::get('/notification',                  [UserNotificationsController::class, 'allNotifications']);
     Route::get('/notification/{id}',             [UserNotificationsController::class, 'markNotification']);
     Route::post('/notification',                 [UserNotificationsController::class, 'markAllNotifs']);

     //User Favourites
     Route::get('/favourites/all',                [UserFavouriteController::class, 'myFavourites']);
     Route::post('/favourites/{id}',              [UserFavouriteController::class, 'addFavourite']);
     Route::delete('/favourites/{id}',            [UserFavouriteController::class, 'delete']);

});

//admin Routes
Route::middleware(['auth:api','VerifyAdmin'])->prefix('admin')->group(function () {

     //Admin Author Routes
     Route::post('/author/create',                [AuthorController::class, 'create']);
     Route::put('/author/{id}',                   [AuthorController::class, 'update']);
     Route::delete('/author/{id}',                [AuthorController::class, 'delete']);

     //admin Category Routes
     Route::post('/category/create',              [CategoryController::class , 'store']);
     Route::put('/category/{id}',                 [CategoryController::class , 'update']);
     Route::delete('/category/{id}',              [CategoryController::class , 'delete']);

     //show all users favourites
     Route::get('/favourites',                    [FavouriteController::class, 'allFavourites']);

     //admin create quote
     Route::post('/quotes/create',                [QuoteController::class, 'create']);
     Route::put('/quotes/{id}',                   [QuoteController::class , 'update']);
     Route::delete('/quotes/{id}',                [QuoteController::class , 'delete']);
     
});

