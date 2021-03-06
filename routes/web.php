<?php

use App\Country;
use App\Photo;
use App\Post;
use App\Tag;
use App\User;

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
//
// Route::get('/insert', function(){
//   DB::insert('insert into posts(title, content) values(?,?)', ['PHP With Laravel', 'Laravel is great!']);
// });
//
// Route::get('/read', function() {
//   $results = DB::select('select * from posts where id = ?', ['2']);
//   return $results;
// });
//
// Route::get('/update', function() {
//   $updated = DB::update('update posts set title = "Potato" where id = 2');
//   return $updated;
// });
//
//
// Route::get('/delete', function() {
//   $deleted = DB::delete('delete from posts where id = ?', [2]);
//   return $deleted;
// });



// Route::get('/read', function() {
//   $posts = Post::all();
//   foreach($posts as $post) {
//     return $post->title;
//   }
// });
//
// Route::get('/find', function() {
//   $post = Post::find(3);
//   return $post;
// });
//
// Route::get('/findwhere', function() {
//   $posts = Post::where('id', 3)->orderBy('id', 'desc')
//                ->take(10)
//                ->get();
//   return $posts;
// });
//
// Route::get('/findmore', function() {
//   $posts = Post::findOrFail(1);
//   return $posts;
// });
//
// Route::get('/basicinsert', function(){
//   $post = new Post;
//   $post->title = 'Is Laravel better than Ruby On Rails?';
//   $post->content = 'It seems like a lot more typing for now';
//   $post->save();
// });
//
// Route::get('/basicupdate', function(){
//   $post = Post::find(3);
//   $post->title = 'Im updating the title';
//   $post->save();
// });
//
// Route::get('/create', function(){
//   Post::create(['title'=>'The Create Title', 'content'=>'WOW I am learning']);
// });
//
// Route::get('/update', function() {
//   Post::where('id', 3)->where('is_admin', 0)->update(['title'=>'NEW PHP TITLE']);
// });
//
// Route::get('/delete', function() {
//   $post = Post::find(3);
//   $post->delete();
// });
//
// Route::get('/delete2', function() {
//   $post = Post::destroy(4);
// });
//
// Route::get('/delete3', function() {
//   $post = Post::destroy([5,6]);
// });
//
// Route::get('/softdelete', function() {
//   $post = Post::find(7);
//   $post->delete();
// });
//
// Route::get('/readsoftdelete', function() {
//   //$post = Post::find(7);
//   //$post = Post::withTrashed()->where('id', 7)->get();
//   //$post = Post::onlyTrashed()->where('id', 7)->get();
//   //$post = Post::onlyTrashed()->where('id', 8)->get();
//   $post = Post::onlyTrashed()->get();
//   return $post;
// });
//
// Route::get('/restore', function() {
//   Post::withTrashed()->restore();
// });
//
// Route::get('/forcedelete', function() {
//   Post::onlyTrashed()->forceDelete();
//   Post::withTrashed()->where('id', 10)->forceDelete();
//   Post::where('id', 11)->forceDelete();
// });

Route::get('/user/{id}/post', function($id){
  return User::find($id)->post;
});

Route::get('/post/{id}/user', function($id){
  return Post::find($id)->user->name;
});

Route::get('/posts', function(){
  $user = User::find(1);
  foreach($user->posts as $post) {
    echo $post->title . '<br />';
  }
});

Route::get('/user/{id}/role', function($id) {
  $user = User::find($id);
  foreach($user->roles as $role) {
    return $role->name;
  }
});

Route::get('user/{id}/pivot', function($id) {
  $user = User::find($id);

  foreach($user->roles as $role) {
    echo $role->pivot->created_at;
  }
});

Route::get('/user/country/{id}', function($id) {
  $country = Country::find($id);
  foreach($country->posts as $post) {
    echo $post->title . '<br />';
  }
});

Route::get('/user/{id}/photos', function($id) {
  $user = User::find($id);
  foreach($user->photos as $photo) {
    return $photo;
  }
});

Route::get('/post/{id}/photos', function($id) {
  $post = Post::find($id);
  foreach($post->photos as $photo) {
    echo $photo->path . '<br />';
  }
});

Route::get('/photo/{id}/post', function($id) {
  $photo = Photo::findOrFail($id);
  return $photo->imageable;
});

Route::get('/post/{id}/tags', function($id) {
  $post = Post::find($id);
  foreach ($post -> tags as $tag) {
    echo $tag->name . '<br />';
  }
});

Route::get('/tag/post/{id}', function($id) {
  $tag = Tag::find($id);
  foreach ($tag -> posts as $post) {
    echo $post->title . '<br />';
  }
});

Route::get('/tag/video/{id}', function($id) {
  $tag = Tag::find($id);
  foreach ($tag -> videos as $video) {
    echo $video->name . '<br />';
  }
});
