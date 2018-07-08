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
    return view('welcome');
});

Route::get('/cookie/set', 'CookieController@setCookie');
Route::get('/cookie/overwrite/{cookieName}/{cookieValue}', function ($cookieName, $cookieValue) {
    switch ($cookieName) {
        case 'source' :
            echo("Source case");
            setcookie("cookie[$cookieName]", "$cookieValue");
            break;
        case "campaign" :
            echo("Source campaign");
            setcookie("cookie[$cookieName]", "$cookieValue");
            break;

        case "voucher" :
            echo("Source voucher");
            setcookie("cookie[$cookieName]", "$cookieValue", time() + (86400 * 30), '/');
            break;

        default :
            dd("No cookie named " . $cookieName . " is present!");
            break;
    }
});
Route::get('/cookie/get', 'CookieController@getCookie');