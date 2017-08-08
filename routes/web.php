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

Route::get('/competition/approved/{type}', [
    'as' => 'approvedTeam',
    'uses' => 'Competition\CheckController@approved'
]);

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
//Route::get('/competition/esport/register', 'Competition\EsportController@showRegister');
//Route::post('/competition/esport/register', 'Competition\EsportController@storeRegister');

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

// Live check in section
Route::get('/api/checkin', 'CheckinCountController@checkincount');
Route::get('/checkin', 'CheckinCountController@showcount');

// Backend shortcut
Route::get('/backend', function() {
    return redirect('/backend/dashboard');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', function() {
        return redirect('/backend/dashboard');
    });
//    Dashboard
    Route::get('/backend/dashboard', function() {
        return view('backend.main');
    })->name('home');
//  Register Excel
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
//    School
    Route::get('/backend/register/school/new', 'Backend\RegisterSchoolController@create')->name('backend.register.school.new');
    Route::post('/backend/register/school/store', 'Backend\RegisterSchoolController@store')->name('backend.register.school.store');
    Route::resource('/backend/register/school', 'Backend\RegisterSchoolController');
    Route::delete('/backend/register/school/destroy/{id}', 'Backend\RegisterSchoolController@destroy')->name('backend.register.school.destroy');
    Route::get('/backend/register/school/view/{id}', 'Backend\RegisterSchoolController@show')->name('backend.register.school.show');
    Route::get('/backend/register/school/edit/{id}', 'Backend\RegisterSchoolController@edit')->name('backend.register.school.edit');
    Route::put('/backend/register/school/update/{id}', 'Backend\RegisterSchoolController@update')->name('backend.register.school.update');
//    Common
    Route::resource('/backend/register/common', 'Backend\RegisterCommonController');
    Route::delete('/backend/register/common/destroy/{id}', 'Backend\RegisterCommonController@destroy')->name('backend.register.common.destroy');
    Route::get('/backend/register/common/view/{id}', 'Backend\RegisterCommonController@show')->name('backend.register.common.show');
    Route::get('/backend/register/common/edit/{id}', 'Backend\RegisterCommonController@edit')->name('backend.register.common.edit');
    Route::put('/backend/register/common/update/{id}', 'Backend\RegisterCommonController@update')->name('backend.register.common.update');
//    Student
    Route::resource('/backend/register/student', 'Backend\RegisterStudentController');
    Route::delete('/backend/register/student/destroy/{id}', 'Backend\RegisterStudentController@destroy')->name('backend.register.student.destroy');
    Route::get('/backend/register/student/view/{id}', 'Backend\RegisterStudentController@show')->name('backend.register.student.show');
    Route::get('/backend/register/student/edit/{id}', 'Backend\RegisterStudentController@edit')->name('backend.register.student.edit');
    Route::put('/backend/register/student/update/{id}', 'Backend\RegisterStudentController@update')->name('backend.register.student.update');

    Route::resource('/backend/register', 'Backend\RegisterController');
//    Check in
    Route::post('/backend/register/checkin/{id}', 'Backend\RegisterController@postCheckin');

//    Competition Excel
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
        'uses' => 'Backend\QuizController@excel'
    ]);
    Route::get('/backend/competition/network/excel', [
        'as' => 'networkExcel',
        'uses' => 'Backend\NetworkController@excel'
    ]);
    Route::get('/backend/competition/project/excel', [
        'as' => 'pitchingExcel',
        'uses' => 'Backend\ProjectITController@excel'
    ]);
//    Esport
    Route::resource('/backend/competition/esport', 'Backend\EsportController');
    Route::delete('/backend/competition/esport/destroy/{id}', 'Backend\EsportController@destroy')->name('backend.competition.esport.destroy');
    Route::get('/backend/competition/esport/view/{id}', 'Backend\EsportController@show')->name('backend.competition.esport.show');
    Route::get('/backend/competition/esport/edit/{id}', 'Backend\EsportController@edit')->name('backend.competition.esport.edit');
    Route::put('/backend/competition/esport/update/{id}', 'Backend\EsportController@update')->name('backend.competition.esport.update');
//    project IT
    Route::resource('/backend/competition/project', 'Backend\ProjectITController');
    Route::delete('/backend/competition/project/destroy/{id}', 'Backend\ProjectITController@destroy')->name('backend.competition.pitching.destroy');
    Route::get('/backend/competition/project/view/{id}', 'Backend\ProjectITController@show')->name('backend.competition.pitching.show');
    Route::get('/backend/competition/project/edit/{id}', 'Backend\ProjectITController@edit')->name('backend.competition.pitching.edit');
    Route::put('/backend/competition/project/update/{id}', 'Backend\ProjectITController@update')->name('backend.competition.pitching.update');
//    Network
    Route::resource('/backend/competition/network', 'Backend\NetworkController');
    Route::delete('/backend/competition/network/destroy/{id}', 'Backend\NetworkController@destroy')->name('backend.competition.network.destroy');
    Route::get('/backend/competition/network/view/{id}', 'Backend\NetworkController@show')->name('backend.competition.network.show');
    Route::get('/backend/competition/network/edit/{id}', 'Backend\NetworkController@edit')->name('backend.competition.network.edit');
    Route::put('/backend/competition/network/update/{id}', 'Backend\NetworkController@update')->name('backend.competition.network.update');
//    PHP
    Route::resource('/backend/competition/php', 'Backend\PhpController');
    Route::delete('/backend/competition/php/destroy/{id}', 'Backend\PhpController@destroy')->name('backend.competition.php.destroy');
    Route::get('/backend/competition/php/view/{id}', 'Backend\PhpController@show')->name('backend.competition.php.show');
    Route::get('/backend/competition/php/edit/{id}', 'Backend\PhpController@edit')->name('backend.competition.php.edit');
    Route::put('/backend/competition/php/update/{id}', 'Backend\PhpController@update')->name('backend.competition.php.update');
//    IT Quiz
    Route::resource('/backend/competition/quiz', 'Backend\QuizController');
    Route::delete('/backend/competition/quiz/destroy/{id}', 'Backend\QuizController@destroy')->name('backend.competition.quiz.destroy');
    Route::get('/backend/competition/quiz/view/{id}', 'Backend\QuizController@show')->name('backend.competition.quiz.show');
    Route::get('/backend/competition/quiz/edit/{id}', 'Backend\QuizController@edit')->name('backend.competition.quiz.edit');
    Route::put('/backend/competition/quiz/update/{id}', 'Backend\QuizController@update')->name('backend.competition.quiz.update');

//    Change Register Status
    Route::post('/backend/competition/{type}/{id}/change', [
        'as' => 'competitionConfirmChange',
        'uses' => 'Competition\CheckController@change']);

//    IT Project PDF Fileget
    Route::get('/backend/competition/project/{id}/bizcanvas', [
        'as' => 'getBizcanvas',
        'uses' => 'Backend\ProjectITController@getBizcanvas'
    ]);
    Route::get('/backend/competition/project/{id}/storyboard', [
        'as' => 'getStoryboard',
        'uses' => 'Backend\ProjectITController@getStoryboard'
    ]);
});
