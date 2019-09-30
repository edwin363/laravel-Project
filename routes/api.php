<?php

use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: *');
//Access-Control-Allow-Origin: *
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

#Rutas de la tabla academic_level
Route::get('/academiclevel', 'AcademicLevelController@index');
Route::post('/academiclevel', 'AcademicLevelController@store');
Route::put('/academiclevel/{id}', 'AcademicLevelController@update');
Route::delete('/academiclevel/{id}', 'AcademicLevelController@destroy');

#Rutas de la tabla scholarships_type
Route::get('/scholarshiptype', 'ScholarshipTypeController@index');
Route::post('/scholarshiptype', 'ScholarshipTypeController@store');
Route::put('/scholarshiptype/{id}', 'ScholarshipTypeController@update');
Route::delete('/scholarshiptype/{id}', 'ScholarshipTypeController@destroy');

#Rutas de la tabla territories
Route::get('/territories', 'TerritoryController@index');
Route::post('/territories', 'TerritoryController@store');
Route::put('/territories/{id}', 'TerritoryController@update');
Route::delete('/territories/{id}', 'TerritoryController@destroy');

#Rutas de la tabla users_type
Route::get('/roles', 'RoleController@index');
Route::post('/roles', 'RoleController@store');
Route::put('/roles/{id}', 'RoleController@update');
Route::delete('/roles/{id}', 'RoleController@destroy');

#Rutas de la tabla repositories
Route::get('/repositories', 'Repository@index');
Route::post('/repositories', 'Repository@store');
Route::put('/repositories/{id}', 'Repository@update');
Route::delete('/repositories/{id}', 'Repository@destroy');

#Rutas de la tabla countries
Route::get('/countries', 'CountryController@index');
Route::post('/countries', 'CountryController@store');
Route::put('/countries/{id}', 'CountryController@update');
Route::delete('/countries/{id}', 'CountryController@destroy');

#Rutas de la tabla users
Route::get('/users','UserController@index');
Route::post('/users','UserController@store');
Route::put('/users/{id}','UserController@update');
Route::delete('/users/{id}','UserController@destroy');

#Rutas de la tabla universities
Route::get('/universities', 'UniversityController@index');
Route::post('/universities', 'UniversityController@store');
Route::put('/universities/{id}', 'UniversityController@update');
ROute::delete('/universities/{id}', 'UniversityController@destroy');
Route::get('/universities/country/{id}', 'UniversityController@universityByCountryId');

#Rutas de la tabla careers
Route::get('/careers', 'CareerController@index');
Route::post('/careers', 'CareerController@store');
Route::put('/careers/{id}', 'CareerController@update');
Route::delete('/careers/{id}', 'CareerController@destroy');
Route::get('/careers/university/{id}', 'CareerController@careerByUniversityId');

#Rutas de la tabla users
Route::post('/users', 'UserController@store');
Route::post('/login', 'UserController@login');
Route::delete('/users/{id}', 'UserController@destroy');


#Rutas de la tabla home 
Route::get('/home', 'HomeController@index');
Route::post('/home', 'HomeController@store');
Route::put('/home/{id}', 'HomeController@update');
Route::delete('/home/{id}', 'HomeController@destroy');

#Rutas de la tabla applicants
Route::get('/applicant', 'AplicantController@index');
Route::post('/applicant', 'AplicantController@store');
Route::put('/applicant/{id}', 'AplicantController@update');
Route::delete('/applicant/{id}', 'AplicantController@destroy');

#Rutas de la tabla profiles
Route::get('/profile', 'ProfileController@index');
Route::post('/profile', 'ProfileController@store');
Route::put('/profile/{id}', 'ProfileController@update');
Route::delete('/profile/{id}', 'ProfileController@destroy');

#Rutas de la tabla requirements
Route::get('/requirement', 'RequirementController@index');
Route::post('/requirement', 'RequirementController@store');
Route::put('/requirement/{id}', 'RequirementController@update');
Route::delete('/requirement/{id}', 'RequirementController@destroy');

#Rutas de la tabla scholarship_detail
Route::get('/scholarship_detail', 'ScholarshipDetailController@index');
Route::post('/scholarship_detail', 'ScholarshipDetailController@store');
Route::put('/scholarship_detail/{id}', 'ScholarshipDetailController@update');
Route::delete('/scholarship_detail/{id}', 'ScholarshipDetailController@destroy');

#Rutas de la tabla scholarships
Route::get('/scholarship', 'ScholarshipController@index');
Route::post('/scholarship', 'ScholarshipController@store');
Route::put('/scholarship/{id}', 'ScholarshipController@update');
Route::delete('/scholarship/{id}', 'ScholarshipController@destroy');