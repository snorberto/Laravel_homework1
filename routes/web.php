<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
    return view('index');
});

Auth::routes();

/*Contact us -- form*/
Route::post('postContactMessage', 'App\Http\Controllers\messageController@save');
/*********************/
/*Navigation to views*/
Route::get("Index", function() {return View::make("News");});
Route::get("News", function() {return View::make("News");});
Route::get("Company", function() {return View::make("Company");});
Route::get("Team", function() {return View::make("Team");});
Route::get("Career", function() {return View::make("Career");});
Route::get("Classif", function() {return View::make("Classif");});
Route::get("Policy", function() {return View::make("Policy");});
Route::get("Develop", function() {return View::make("Develop");});
Route::get("AdminSite", function() {return View::make("AdminSite");});
Route::get("ContactUs", function() {return View::make("ContactUs");});
/************************************ */

/*Admin page actions */
Route::get("adm_messageResult", "App\Http\Controllers\messageController@showMessages");
Route::get("adm_getUsersResult", "App\Http\Controllers\userController@showUsers");
Route::get("adm_userDelete/{id}", "App\Http\Controllers\userController@deleteUser");
Route::get("adm_userUpdate/{id}", "App\Http\Controllers\userController@showIndividualUser");
Route::post('adm_userUpdate/postEditUser', "App\Http\Controllers\userController@updateIndividualUser");

Route::get("adm_addUsers", function() {return View::make("adm_addUsers");});
Route::post('postAddUser', 'App\Http\Controllers\userController@saveUser');


/********************** */


/****Image Gallery routes */
Route::get('image-galleryMain',"App\Http\Controllers\ImageGalleryController@index");
Route::get('img_viewPic',"App\Http\Controllers\ImageGalleryController@showPictures");
Route::get('imguploadPic', function() {return View::make("image-galleryCreate");});
Route::resource('ImageGallery',"App\Http\Controllers\ImageGalleryController");
Route::get("img_pictureDelete/{id}", "App\Http\Controllers\ImageGalleryController@deletePicture");
