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

//Route::get('/', function () {
//    return view('default-views.home');
//});

/*
 * 首页
 * */
Route::get('/', 'WebController@home');

/*
 * 图辑页面
 * */
Route::get('album/{album_id}/{image_id?}', 'WebController@album');

/*
 * 类目页面
 * */
Route::get('category/{cate_id}', 'WebController@category');

/*
 * 标签页面
 * */
Route::get('tag/{tag_id}', 'WebController@tag');

Route::get('detail', function () {
    return view('default-views.detail');
});

Route::get('category', function () {
    return view('default-views.category');
});

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('categories', 'CategoryController@categories');
Route::get('parent_categories', 'CategoryController@parentCategories');
Route::get('subcategories/{cid}', 'CategoryController@subcategories');
Route::get('albums', 'AlbumsController@getAlbums');

Route::get('albums/recommend', 'AlbumsController@recommend');
Route::get('albums/today', 'AlbumsController@today');

Route::get('pinfo',function(){
    phpinfo();
});