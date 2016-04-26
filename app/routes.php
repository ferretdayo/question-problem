<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//View
// 投稿formを表示する
Route::get('/', 'HomeController@showWelcome');

Route::get('/detail', function()
{
  return View::make('main.detail');
});

// 質問や出題についてのSubmit
Route::post('/', 'PostController@store');
// すべてのPostを表示する
Route::get('/', 'PostController@index');

// 質問や出題についてのSubmit
Route::post('/info_grade/{grade}', 'PostController@store_grade');
//各学年の質問や出題の表示
Route::get('/info_grade/{grade}','InformationController@show_grade_data');

// コメントを押した場合の題目を1つ表示
Route::get('/detail', 'PostController@detail');
// コメントを押した場合の入力されたコメントを表示する
Route::post('/detail', 'PostController@comment_store');