<?php

use App\Post;  //Book->Post
use Illuminate\Http\Request;

/**
* 本のダッシュボード表示(books.blade.php) 
* -> 質問のダッシュボード表示(post.blade.php)
*/

Route::get('/', 'PostsController@index');


// 更新画面
Route::post(' /postsedit/{posts} ', 'PostsController@edit');


//更新処理
Route::post('/posts/update', 'PostsController@update');


/**
* 新「本」を追加 ・投稿を追加
*/
Route::post('/posts', 'PostsController@store');


/**
* 本を削除 
*/

Route::delete('/post/{post}', 'PostsController@destroy');


Auth::routes();

Route::get('/home', 'PostsController@index')->name('home');
