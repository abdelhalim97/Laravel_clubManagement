<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registrerOnlineController;
use App\Http\Controllers\handleUserController;
use App\Http\Controllers\ClubsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\CommententController;
use App\Http\Controllers\ClubsDashboardController;
use App\Http\Controllers\EventsDashboardController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LikeController;


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

Route::get('/',[ClubController::class, 'index'])->name('show-clubs');
// Route::get('/home',[ClubController::class, 'index'])->name('Home');

Route::group(['middleware'=>['auth']],function(){
    Route::get('/clubs',[registrerOnlineController::class, 'index'])->name('clubs');
    Route::get('/add-event',[EventController::class, 'create'])->name('add-event');
    Route::post('/add-event',[EventController::class, 'store'])->name('add-event-post');
    Route::post('/show-clubs/{id}',[FollowController::class, 'update'])->name('follow');
    Route::get('/show-follows',[FollowController::class, 'index'])->name('show-follows');
    Route::post('/show-clubs/club/{idE}',[CommententController::class, 'update'])->name('show-follows-event');//
    Route::post('/show-events/{id}',[EventController::class, 'update'])->name('show-follows-event2');//comment
    Route::get('/show-events/comment/delete/{id}',[ CommententController::class,'destroy'])->name('delete-comment');
    Route::get('/show-clubs/unfollow/{id}',[FollowController::class, 'destroy'])->name('unfollow');
    Route::get('/show-clubs/unfollow/{id}',[FollowController::class, 'edit'])->name('unfollow2');
    Route::get('/show-events/{id}/like',[LikeController::class, 'show'])->name('like');//comment
    Route::get('/show-events/{id}/dislike',[LikeController::class, 'edit'])->name('dislike');//comment
});
Route::get('/show-clubs/club/{idE}',[CommententController::class, 'show'])->name('show-follows-event');//
Route::get('/show-events/{id}',[EventController::class, 'show'])->name('show-event');

Route::group(['middleware'=>['auth','role:admin']],function(){//
    Route::get('/admin',[handleUserController::class, 'index'])->name('admin');
    // Route::get('/add-club',[ClubController::class, 'create'])->name('add-club');
    Route::post('/add-club',[ClubController::class, 'store'])->name('add-club-post');
    Route::get('/dashboard/users-dashboard',[UserController::class, 'index'])->name('users-dashboard');
    Route::get('/dashboard/clubs-dashboard',[ClubsDashboardController::class, 'index'])->name('clubs-dashboard');
    Route::get('/dashboard/events-dashboard',[EventsDashboardController::class, 'index'])->name('events-dashboard');
    Route::get('/dashboard/add-club',[ClubsDashboardController::class, 'create'])->name('add-club-dashboard');
    Route::post('/dashboard/add-club',[ClubController::class, 'store'])->name('add-club-post-dashboard');
    Route::get('/dashboard/add-event',[EventsDashboardController::class, 'create'])->name('add-event-dashboard');
    Route::post('/dashboard/add-event',[EventController::class, 'store'])->name('add-event-post-dashboard');
    Route::get('/dashboard/clubs-dashboard/delete/{id}',[ ClubsDashboardController::class,'destroy'])->name('delete-club-dashboard');
    Route::get('/dashboard/events-dashboard/delete/{id}',[ EventsDashboardController::class,'destroy'])->name('delete-event-dashboard');
    Route::get('/dashboard/clubs-dashboard/{id}',[ClubsDashboardController::class, 'show'])->name('clubs-dashboard-show');
    Route::post('/dashboard/clubs-dashboard/{id}',[ClubsDashboardController::class, 'update'])->name('clubs-dashboard-update');
    Route::get('/dashboard/events-dashboard/{id}',[EventsDashboardController::class, 'show'])->name('events-dashboard-show');
    Route::post('/dashboard/events-dashboard/{id}',[EventsDashboardController::class, 'update'])->name('events-dashboard-update');
});
Route::get('/show-clubs',[ClubController::class, 'index'])->name('show-clubs');
Route::get('/show-events',[EventController::class, 'index'])->name('show-events');
Route::get('/show-clubs/{id}',[ClubController::class, 'show'])->name('show-club');
Route::post('/show-events', [SearchController::class,'store']);
Route::post('/show-clubs', [SearchController::class,'create']);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
