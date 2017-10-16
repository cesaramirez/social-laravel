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

$router->view('/', 'welcome')->name('welcome');

$router->auth();

$router->get('/home', 'HomeController@index')->name('home');

$router->get('/login/{service}', 'Auth\SocialLoginController@redirect');
$router->get('/login/{service}/callback', 'Auth\SocialLoginController@callback');
