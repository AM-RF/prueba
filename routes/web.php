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
use App\User;

Route::get('/', function () {

    /*$users = User::all();
    foreach($users as $user){
        var_dump($user);
    }
    die();*/
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/delete/{id}', 'HomeController@delete')->name('home.delete');
Route::get('/email/{id}', 'HomeController@sendEmail')->name('home.email');
