<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/about', function () {
    return "Hello from the about page";
});
Route::get('/contact', function () {
    return "Hi, I am the contact page";
});
Example of how to to use variables within a route
Route::get('/post/{id}/{name}', function ($id,$name) {
    return "This is post number " . $id . " for user: " .$name;
});
Example of how to to use nicknames for our routes
Route::get('/admin/posts/example', array('as'=>'admin.home', function() {
    $url = route('admin.home');
    return "This url is " .$url;
}));
*/

// Route::get('/post/{id}', 'PostsController@index');
// creates URL params automatically with name routes and everything!
Route::resource('posts','PostsController');
// contact form page
Route::get('/contact','PostsController@contact');
//
Route::get('/post/{id}/{name}/{magic}','PostsController@show_post');