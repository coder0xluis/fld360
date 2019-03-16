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
Route::get('album/{album_id}', 'WebController@album');

/*
 * 类目页面
 * */
Route::get('category/{cate_id}', 'WebController@category');

/*
 * 标签页面
 * */
Route::get('tag/{tag_id}', 'WebController@tag');


/*
 * 今日更新
 * */
Route::get('today', 'WebController@today');


/*
 * 站点地图
 * */
Route::get('sitemap.xml', function () {
    return response(view('sitemap')->render())
        ->header('Content-Type', 'text/xml');
});


/*
 * 访客测试
 * */
Route::get('visitor/{promoter?}','VisitorController@test');
Route::get('visitor1/{promoter?}','VisitorController@test1');




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

Route::get('pinfo', function () {
    phpinfo();
});