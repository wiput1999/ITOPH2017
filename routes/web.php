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
   return view('route', ["title" => "การเดินทาง | "]);
});

Route::get('/contact', function () {
    return view('contact', ["title" => "ติดต่อเรา | "]);
});

// Register Guest
Route::get('/register/guest', 'RegisterController@createGuestRegister');

Route::post('/register/guest', 'RegisterController@storeGuestRegister');

Route::get('/register/guest_school', 'RegisterController@createGuestSchoolRegister');

Route::post('/register/guest_school', 'RegisterController@storeGuestSchoolRegister');

Route::get('/register/guest_student', 'RegisterController@createGuestStudentRegister');

Route::post('/register/guest_student', 'RegisterController@storeGuestStudentRegister');

// Register MailESport

// PHP
Route::get('/competition/php', 'Competition\PhpController@showRule');
Route::get('/competition/php/register', 'Competition\PhpController@showRegister');
Route::post('/competition/php/register', 'Competition\PhpController@storeRegister');

// Network
Route::get('/competition/network', 'Competition\NetworkController@showRule');
Route::get('/competition/network/register', 'Competition\NetworkController@showRegister');
Route::post('/competition/network/register', 'Competition\NetworkController@storeRegister');

// E-Sport
Route::get('/competition/esport', 'Competition\EsportController@showRule');
Route::get('/competition/esport/register', 'Competition\EsportController@showRegister');
Route::post('/competition/esport/register', 'Competition\EsportController@storeRegister');

// Quiz
Route::get('/competition/quiz', 'Competition\QuizController@showRule');
Route::get('/competition/quiz/register', 'Competition\QuizController@showRegister');
Route::post('/competition/quiz/register', 'Competition\QuizController@storeRegister');

// Project IT
Route::get('/competition/project', 'Competition\ProjectITController@showRule');
Route::get('/competition/project/register', 'Competition\ProjectITController@showRegister');
Route::post('/competition/project/register', 'Competition\ProjectITController@storeRegister');

// Backend
Route::get('/backend/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/backend/login', 'Auth\LoginController@login');

Route::post('/backend/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/backend/logout', 'Auth\LoginController@logout')->name('logout');

//Route::get('/backend/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('/backend/register', 'Auth\RegisterController@register');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/backend/dashboard', function() {
        return view('backend.main');
    })->name('home');

    Route::get('/backend/register/common/excel', [
        'as' => 'commonExcel',
        'uses' => 'Backend\RegisterCommonController@excel'
    ]);
    Route::get('/backend/register/school/excel', [
        'as' => 'schoolExcel',
        'uses' => 'Backend\RegisterSchoolController@excel'
    ]);
    Route::get('/backend/register/student/excel', [
        'as' => 'studentExcel',
        'uses' => 'Backend\RegisterStudentController@excel'
    ]);
    Route::resource('/backend/register/common', 'Backend\RegisterCommonController');
    Route::resource('/backend/register/school', 'Backend\RegisterSchoolController');
    Route::resource('/backend/register/student', 'Backend\RegisterStudentController');
    Route::resource('/backend/register', 'Backend\RegisterController');
    Route::post('/backend/register/checkin/{id}', 'Backend\RegisterController@postCheckin');
    Route::resource('/backend/user', 'Backend\UserController');
    Route::get('/backend/competition/esport/excel', [
        'as' => 'esportExcel',
        'uses' => 'Backend\EsportController@excel'
    ]);
    Route::get('/backend/competition/php/excel', [
        'as' => 'phpExcel',
        'uses' => 'Backend\PhpController@excel'
    ]);
    Route::get('/backend/competition/quiz/excel', [
        'as' => 'quizExcel',
        'uses' => 'Backend\ITQuizController@excel'
    ]);
    Route::get('/backend/competition/network/excel', [
        'as' => 'networkExcel',
        'uses' => 'Backend\NetworkController@excel'
    ]);
    Route::get('/backend/competition/pitching/excel', [
        'as' => 'pitchingExcel',
        'uses' => 'Backend\ITPitchingController@excel'
    ]);
    Route::resource('/backend/competition/esport', 'Backend\EsportController');
    Route::resource('/backend/competition/pitching', 'Backend\ITPitchingController');
    Route::resource('/backend/competition/network', 'Backend\NetworkController');
    Route::resource('/backend/competition/php', 'Backend\PhpController');
    Route::resource('/backend/competition/quiz', 'Backend\ITQuizController');
    Route::post('/backend/competition/{type}/{id}/change', [
        'as' => 'competitionConfirmChange',
        'uses' => 'Competition\CheckController@change']);
    Route::get('/backend/competition/pitching/{id}/bizcanvas', [
        'as' => 'getBizcanvas',
        'uses' => 'Competition\ITPitchingController@getBizcanvas'
    ]);
    Route::get('/backend/competition/pitching/{id}/storyboard', [
        'as' => 'getStoryboard',
        'uses' => 'Competition\ITPitchingController@getStoryboard'
    ]);
});