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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function() {
//     return "HI about page!";
// });
//
// Route::get('/contact', function() {
//     return "HI contact page!";
// });
//
// Route::get('/post/{id}', function($id) {
//   return "This is post number ". $id;
// });
//
// Route::get('admin/posts/example', array('as'=>'admin.home', function(){
//     $url = route('admin.home');
//     return "this url is " . $url;
// }));

// Route::get('/post/{id}', 'PostsController@index');

// Route::resource('posts', 'PostsController');
// Route::get('/contact', 'PostsController@contact');
//
// Route::get('post/{id}/{name}/{password}', 'PostsController@show_post');

Route::get('/insert', function(){
  DB::insert('insert into posts(title, content) values(?,?)', ['PHP With Laravel', 'Laravel is great!']);
});

Route::get('/read', function() {
  $results = DB::select('select * from posts where id = ?', ['2']);
  return $results;
});

Route::get('/update', function() {
  $updated = DB::update('update posts set title = "Potato" where id = 2');
  return $updated;
});


Route::get('/delete', function() {
  $deleted = DB::delete('delete from posts where id = ?', [2]);
  return $deleted;
});
