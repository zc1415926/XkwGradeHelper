<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('classgrade', array(
	'as' => 'classgrade.index',
	'uses' => 'ClassGradeController@index'
));

Route::get('classgrade/sync', array(
	'as' => 'classgrade.sync',
	'uses' => 'ClassGradeController@sync'
));

Route::get('classgrade/grades', array(
	'as' => 'classgrade.grades',
	'uses' => 'ClassGradeController@getGrades'
));

//从学科网同步年级班级信息
Route::get('students', array(
	'as' => 'students.index',
	'uses' => 'StudentsController@index'
));