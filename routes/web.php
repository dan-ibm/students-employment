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
    return view('welcome');
});

Route::get('/students', function () {
    return view('students/student');
});


Route::get('login', 'AuthController@index');
Route::post('post-login', 'AuthController@postLogin');
Route::get('registration', 'AuthController@registration');
Route::post('post-registration/{type}', 'AuthController@postRegistration')->name('post-reg');
Route::get('employers/dashboard', 'AuthController@dashboard');
Route::get('students/dashboard', 'AuthController@dashboard');
Route::get('vacancies/all', 'VacancyController@showAll');
Route::get('vacancies/{id}', 'VacancyController@show');
Route::get('logout', 'AuthController@logout');

Route::post('vacancy-post', 'VacancyController@store');
Route::get('vacancy-create', 'VacancyController@create');
Route::apiResource('/vacancies', 'VacancyController');

Route::get('vacancies/{vacancy}/edit', 'VacancyController@edit')->name('vacancy-edit');

Route::apiResource('/employers', 'EmployerController');
Route::get('employers/create', 'EmployerController@create')->name('employer-create');
Route::get('employers/{employer}/edit', 'EmployerController@edit')->name('employer-edit');

Route::get('list', 'EmployerController@show');
Route::get('list/{id}', 'EmployerController@showById');

Route::get('resume','StudentController@showOne');
Route::get('resume/generate-pdf','StudentController@generatePDF');
//Route::resource('employers','EmployerController');
//Route::get('employers/{id}/edit/','EmployerController@edit');
