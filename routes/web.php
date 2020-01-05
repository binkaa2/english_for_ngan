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
    return view('cms.pages.english.index');
});

Route::get('/unit1/reading/text1', function () {
    return view('cms.pages.english.unit1.reading.text1');
})->name('unit1.reading.text1');

Route::post('/unit1/reading/text1','EnglishController@unit1_text1')->name('unit1.reading.text1_post');

Route::get('/unit1/reading/text2', function () {
    return view('cms.pages.english.unit1.reading.text2');
})->name('unit1.reading.text2');

Route::get('/unit1/vocabulary/vocab1', function () {
    return view('cms.pages.english.unit1.vocabulary.vocab1');
})->name('unit1.vocabulary.vocab1');

Route::get('/unit2/reading/text1', function () {
    return view('cms.pages.english.unit2.reading.text1');
})->name('unit2.reading.text1');

Route::get('/unit2/reading/text2', function () {
    return view('cms.pages.english.unit2.reading.text2');
})->name('unit2.reading.text2');

Route::get('/unit2/vocabulary/vocab1', function () {
    return view('cms.pages.english.unit2.vocabulary.vocab1');
})->name('unit2.vocabulary.vocab1');


Route::get('/unit3/reading/text1', function () {
    return view('cms.pages.english.unit3.reading.text1');
})->name('unit3.reading.text1');

Route::get('/unit3/reading/text2', function () {
    return view('cms.pages.english.unit3.reading.text2');
})->name('unit3.reading.text2');

Route::get('/unit3/vocabulary/vocab1', function () {
    return view('cms.pages.english.unit3.vocabulary.vocab1');
})->name('unit3.vocabulary.vocab1');

/**
 * Route cms page
 * @prefix cms
 * @route Dashboard
 * @route User
 */
Route::get('/login','CMS\\LoginController@index');
Route::post('/login','CMS\\LoginController@checkAdmin');
Route::post('/logout','CMS\\LoginController@logout');
Route::group(['prefix'=>'cms','middleware'=>['auth.admin']],function(){
    Route::get('/','CMS\\DashboardController@index')->name('cms.index');
    Route::get('users/add','CMS\\UserController@create');
    Route::get('users/report','CMS\\UserController@userReportIndex')->name('users.report');
    Route::post('users/deactivate','CMS\\UserController@deactivateUser')->name('users.deactivate');
    Route::post('users/active','CMS\\UserController@activeUser')->name('users.active');
    Route::post('users/import','CMS\\UserController@import')->name('users.import');
    Route::get('users/export','CMS\\UserController@export')->name('users.export');
    Route::delete('users/bulk_delete','CMS\\UserController@bulkDelete')->name('users.bulk_delete');
    Route::resource('users','CMS\\UserController');
    Route::get('products/report','CMS\\ProductController@productReportIndex')->name('products.report');
    Route::get('products/takedown/{id}','CMS\\ProductController@productTakedown')->name('products.takedown');
    Route::delete('products/bulk_delete','CMS\\ProductController@bulkAction')->name('products.bulk_action');
    Route::get('products/activate/{id}','CMS\\ProductController@productActivate')->name('products.activate');
    Route::post('products/import','CMS\\ProductController@import')->name('products.import');
    Route::get('products/export','CMS\\ProductController@export')->name('products.export');
    Route::resource('products','CMS\\ProductController');
    Route::resource('category','CMS\\CategoryController');
    Route::resource('districts','CMS\\DistrictController');
    Route::resource('banners','CMS\\BannerController');
});
