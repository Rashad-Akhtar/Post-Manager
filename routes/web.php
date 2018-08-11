<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{provider}/auth','SocialAuthController@social')->name('social.auth');
Route::get('/{provider}/redirect','SocialAuthController@auth_callback')->name('social.callback');

Route::get('/forum','ForumController@index')->name('forum');
Route::get('/discussion/{slug}','DiscussionController@show')->name('discussion');
Route::get('/channel/{slug}','ForumController@channel')->name('channel.slug');

Route::group(['middleware'=>'auth'],function(){
   Route::resource('channels','ChannelsController');
   Route::get('/discuss/create','DiscussionController@create')->name('discuss.create');
   Route::post('/discuss/store','DiscussionController@store')->name('discuss.store');
   
   Route::get('/reply/best_answer/{id}','LikesController@best_answer')->name('reply.best_answer');
   
  
   Route::post('/reply/store/{id}','DiscussionController@reply')->name('reply.store');
   Route::get('/reply/like/{id}','LikesController@like')->name('reply.like');
   Route::get('/reply/unlike/{id}','LikesController@unlike')->name('reply.unlike');

   Route::get('/discussion/watch/{id}','WatchersController@watch')->name('discussion.watch');
   Route::get('/discussion/unwatch/{id}','WatchersController@unwatch')->name('discussion.unwatch');
   Route::get('/discussion/edit/{id}','DiscussionController@edit')->name('discussion.edit');
   Route::post('/discussion/update/{id}','DiscussionController@update')->name('discussion.update');

   Route::get('/reply/edit/{id}','RepliesController@edit')->name('reply.edit');
   Route::post('/reply/update/{id}','RepliesController@update')->name('reply.update');

   
});
