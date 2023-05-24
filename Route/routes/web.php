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

// Route::get('/', function () {
//     return view('welcome');
// });

    //Route Default
// Route::get('/user', 'UseerController@index');

//     //Metode Route
// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);

// Route::match(['get', 'post'], '/', function(){
//     //
// });
// Route::any('/', function(){
//     //
// });

//     //Redirect Routre
// Route::redirect('/here', '/there');
// Route::redirect('/here'. '/there', 301);
// Route::permanentRedirect('/here', '/there');

//     //Route view
// Route::view('/welcome', 'welcome');
// Route::view('/we;come', 'welcome', ['name' => 'ainun']);

//     //Parameter Opsional
// Route::get('user/{name?}', function ($name = null) {
//     return $name;
// });
// Route::get('user/{name?}', function ($name = 'khofifah') {
//     return $name;
// });

//     //Regular Expression Constraints
// Route::get('user/{name}', function ($name = 'Khofifah') {
//     return $name;
// }) ->where('name', '[A-Za-z]+');
// Route::get('user/{id}', function ($id = '41210716') {
//     return $id;
// }) ->where('id', '[0-9]+');
// Route::get('user/{id}/{name}', function ($id = '41210716', $name = 'Khofifah') {
//     return $name;
//     return $id;
// }) ->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

//     //Global Constraints
// Route::get('user/{id}', function ($id) {
//     //
// });

//     //Encode Forward Slashes
// Route::get('search/{search}', function ($search) {
//     return $search;
// }) ->where('search', '.*');

//     //Middleware
// Route::middleware(['first', 'second']) -> group (function() {
//     Route::get('/login', function (){
//         return "Ini halaman login";
//     });
// });

//     //Namespace
// Route::namespace('Admin') -> group (function () {
//     Route::get('/profile',function(){
//         return "Ini web profile";
//     });
// });

//     //Subdomain Routing
// Route::domain('{account}.myapp.com') -> group (function() {
//     Route::get('user/{id}', function ($account, $id) {

//     });
// });

//     //Route Prefixes
// Route::prefix('admin') -> group(function () {
//     Route::get('users', function () {

//     });
// });

    //Route Name Prefixes
Route::prefix('admin')->group(function(){
    Route::get('/user/{search?}',function($search="Route dengan nama"){
        return $search;
    })->where('search', '.*')->name("routeName");
    Route::get('/gagal', function(){
        return "maaf kamu gagal";
    })->name("gagal");
});

// Route::name('admin.') -> group(function () {
//     Route::get('users', function () {

//     }) -> name('users');
// });