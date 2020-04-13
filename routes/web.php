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

Route::get('/', 'VacancyController@showAll');

//auth process

Route::get('login', 'AuthController@index');
Route::post('post-login', 'AuthController@postLogin');
Route::get('registration', 'AuthController@registration');
Route::post('post-registration/{type}', 'AuthController@postRegistration')->name('post-reg');
Route::get('logout', 'AuthController@logout');
Route::get('reset', 'AuthController@reset');
Route::post('post-reset', 'AuthController@postReset');
Route::post('check-reset', 'AuthController@checkReset');
Route::post('successful-reset', 'AuthController@successReset');

//employer routes
Route::apiResource('/employers', 'EmployerController');
Route::get('employers/create', 'EmployerController@create')->name('employer-create');
Route::get('employers/{employer}/edit', 'EmployerController@edit')->name('employer-edit');
//Route::get('list', 'EmployerController@show');
//Route::get('list/{id}', 'EmployerController@showById');
Route::get('employers/dashboard', 'EmployerController@index');


//student routes
Route::get('students/dashboard', 'StudentController@index');
Route::get('resume','StudentController@showOne');
Route::get('resume/generate-pdf','StudentController@generatePDF');


//vacancy routes
Route::apiResource('/vacancies', 'VacancyController');
Route::get('vacancy/{id}', 'VacancyController@show');
Route::post('vacancy-post', 'VacancyController@store');
Route::get('vacancy-create', 'VacancyController@create');

Route::get('vacancies/{vacancy}/edit', 'VacancyController@edit')->name('vacancy-edit');




//Route::resource('employers','EmployerController');
//Route::get('employers/{id}/edit/','EmployerController@edit');
