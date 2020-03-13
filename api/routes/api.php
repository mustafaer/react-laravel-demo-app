<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// List Classrooms
Route::get('classroom', 'ClassroomController@index');

// Get single Classroom
Route::get('classroom/{id}', 'ClassroomController@show');

// Create new Classroom
Route::post('classroom', 'ClassroomController@store');

// Update Classroom
Route::post('classroom/{id}', 'ClassroomController@update');

// Delete Classroom
Route::post('delete_classroom/{id}', 'ClassroomController@destroy');


// List Students
Route::get('student', 'StudentController@index');

// Get single Student
Route::get('student/{id}', 'StudentController@show');

// Create new Student
Route::post('student', 'StudentController@store');

// Update Student
Route::post('student/{id}', 'StudentController@update');

// Delete Student
Route::post('delete_student/{id}', 'StudentController@destroy');

    
// List Lessons
Route::get('lesson', 'LessonController@index');

// Get single Lesson
Route::get('lesson/{id}', 'LessonController@show');

// Create new Lesson
Route::post('lesson', 'LessonController@store');

// Update Lesson
Route::post('lesson/{id}', 'LessonController@update');

// Delete Lesson
Route::post('delete_lesson/{id}', 'LessonController@destroy');