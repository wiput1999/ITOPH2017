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

// Static Pages
Route::get('/', function () {
    return view('index', ["title" => ""]);
});

Route::get('/schedule', function () {
   return view('schedule', ["title" => "กำหนดการ | "]);
});

Route::get('/route', function () {
   return view('route', ["การเดินทาง | "]);
});

Route::get('/contact', function () {
    return view('contact', ["ติดต่อเรา | "]);
});

// Register Guest
Route::get('/register/guest', 'RegisterController@createGuestRegister');

Route::post('/register/guest', 'RegisterController@storeGuestRegister');

Route::get('/register/guest_school', 'RegisterController@createGuestSchoolRegister');

Route::get('/register/guest_student', 'RegisterController@createGuestStudentRegister');

// Register Competition

// PHP
Route::get('/competition/php', 'Competition\PhpController@showRule');

// Network
Route::get('/competition/network', 'Competition\NetworkController@showRule');

// E-Sport
Route::get('/competition/esport', 'Competition\EsportController@showRule');

// Quiz
Route::get('/competition/quiz', 'Competition\QuizController@showRule');

// Project IT
Route::get('/competition/project', 'Competition\ProjectITController@showRule');