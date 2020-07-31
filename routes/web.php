<?php

use Illuminate\Support\Facades\Route;
use App\Post;
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

/*  
|--------------------------------------------------------------------------
| Getting used to routes and what they can do...
|--------------------------------------------------------------------------
*/
Route::get('/about', function () {
    return "Hello from the about page";
});
Route::get('/contact', function () {
    return "Hi, I am the contact page";
});
// Example of how to to use variables within a route
Route::get('/post/{id}/{name}', function ($id,$name) {
    return "This is post number " . $id . " for user: " .$name;
});
// Example of how to to use nicknames for our routes
Route::get('/admin/posts/example', array('as'=>'admin.home', function() {
    $url = route('admin.home');
    return "This url is " .$url;
}));
//return post id 
Route::get('/post/{id}', 'PostsController@index');
// creates URL params automatically with name routes and everything!
Route::resource('posts','PostsController');
// contact form page
Route::get('/contact','PostsController@contact');
// show post controller for returning data
Route::get('/post/{id}/{name}/{magic}','PostsController@show_post');

/*  
|--------------------------------------------------------------------------
| Raw DB MySQL Queries
|--------------------------------------------------------------------------
*/

Route::get('/insert',function() {
    DB::insert('insert into posts(title, content) values(?,?)',['raw data','rahoahaohohs']);


});

Route::get('/read', function() {
    // $results come in stdClass format
    $results = DB::select('select * from posts where id = ?',[1]);
    return $results;

    // foreach ($results as $stuff) {
    //     return $stuff->title;
    // }
});

Route::get('/update', function() {
    
    $updated = DB::update('update posts set title = "Updated title" where id =?', [1]);
    return $updated;
});

Route::get('/delete', function() {

    $deleted = DB::delete('delete from posts where id = ?', [1]);

    return $deleted;

});

/*  
|--------------------------------------------------------------------------
| Eloquent - Object Relational Model
|--------------------------------------------------------------------------
*/

Route::get('/find', function() {
    $post = Post::find(2);

    // foreach ($posts as $post) {
        return $post->title;
    // }
});

Route::get('/findwhere', function() {

    $posts = Post::where('id',2)->orderBy('id','desc')->take(1)->get();
    return $posts;
});

Route::get('/findmore',function () {
    // try to find a record, if it can't find, it'll give you an exception
    // $posts = Post::findOrFail(1);
    // return $posts;

    $posts1 = Post::where('id','<',50)->firstorFail();

    return $posts1;
});

/*  
|--------------------------------------------------------------------------
| Inserting Data with Eloquent - Object Relational Model
|--------------------------------------------------------------------------
*/

Route::get('/basicinsert', function() {
    $post = new Post;

    $post->title = 'New Eloquent ORM Title';
    $post->content = 'Dont you just love the stuff that eloquent can do!';

    $post->save();
});

Route::get('/findandupdate', function() {
    $post = Post::find(2);

    $post->title = 'Poopy doopy scoopy';
    $post->content = 'interestingly boring insertion of stuff';

    $post->save();
});

