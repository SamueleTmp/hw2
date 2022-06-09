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

Route::post('/login', "App\Http\Controllers\LoginController@check_login");


//Necessarie il login
Route::get('/', function () {
    
    if(Session::get('username')){
        return redirect('/home');
    }
    else
    {
        return view('login');
    }
});

//Route::get("/login", "App\Http\Controllers\LoginController@login");
//Route::post("/logout", "App\Http\Controllers\LoginController@logout");




//Necessarie per il register
Route::get('/register', function(){
    return view('register');
});
Route::post('/register', "App\Http\Controllers\RegisterController@create");
Route::get("/register/username/{q}", "App\Http\Controllers\RegisterController@checkUsername");


//Necessarie per la homepage
Route::get('/home', function(){
    if(Session::get('username')){
        return view('home');
    }
    else
    {
        return redirect('/');
    }
    
});


Route::get('/home/info_utente', "App\Http\Controllers\HomepageController@info_utente");

Route::get('/home/upload_post', "App\Http\Controllers\HomepageController@upload_post");

Route::post('/home/OMDBapi', "App\Http\Controllers\HomepageController@create_post");

Route::get('/home/liked/{id_post}', "App\Http\Controllers\HomepageController@like");
Route::get('/home/unliked/{id_post}', "App\Http\Controllers\HomepageController@unlike");

Route::get('/home/cerca_film/{nome_film}', "App\Http\Controllers\HomepageController@cerca_film");
Route::get('/home/cerca_utente/{nome_utente}', "App\Http\Controllers\HomepageController@cerca_utente");



//Per il profilo degli altri utenti
Route::get('/profilo/utente_cercato', function(){
    if(Session::get('ricerca_utenti'))
    {
        return view('profilo_altro_utente');
    }
    else
    {
        return redirect('/home');
    }
});

Route::get('/profilo/info_profilo_altrui', "App\Http\Controllers\ProfiloAltruiController@info_utente");
Route::get('/profilo/upload_post_profilo_altri_utenti', "App\Http\Controllers\ProfiloAltruiController@upload_post");

//Necessarie per il profilo personale
Route::get('/profilo', function(){
    if(Session::get('username'))
        return view('profilo_personale');
});

Route::get('/profilo/info_utente_profilo', "App\Http\Controllers\ProfiloPersonaleController@info_utente");
Route::get('/profilo/upload_post_profilo', "App\Http\Controllers\ProfiloPersonaleController@upload_post");

Route::get('/profilo/elimina_post/{id_post}', "App\Http\Controllers\ProfiloPersonaleController@elimina_post");



//Necessarie per il logout
Route::get('/logout', function(){
    Session::flush();
    return redirect('/');
});