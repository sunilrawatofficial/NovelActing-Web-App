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
    return view('layouts.homepage.home');
})->middleware('auth');
Auth::routes();

Route::get('/home', function () {
    return view('layouts.homepage.home');
});
Route::get('/register', function () {
    return route('register');
});
Auth::routes();


Route::get('allcategories','NovelController@showAllcategories')->name("showAllcategories");
Route::get('showAllNovels','NovelController@showAllNovels')->name("showAllNovels");
Route::get('addNovelsPage','NovelController@addNovelsPage')->name("addNovelsPage");
Route::post('addNovelInfo','NovelController@addNovelInfo')->name("addNovelInfo");


Route::post('addCategory','NovelController@addCategory')->name("addCategory");


Route::get('viewCategory/{id}','NovelController@viewCategory');
Route::get('deleteCategory/{id}','NovelController@deleteCategory');
Route::get('changeCategoryStatus','NovelController@changeCategoryStatus')->name("changeCategoryStatus");;




