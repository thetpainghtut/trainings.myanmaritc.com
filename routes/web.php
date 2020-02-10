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

Route::get('/','FrontendController@index')->name('frontend.index');

Route::get('student_register','FrontendController@studentRegister')->name('frontend.student.register');

Route::get('allcourses','FrontendController@courses')->name('frontend.courses');

Route::get('csr','FrontendController@csr')->name('frontend.csr');

Route::get('contact','FrontendController@contact')->name('frontend.contact');

Route::get('dashboard',function (){
  return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::resource('courses','CourseController')->middleware('role:Admin');

Route::resource('batches','BatchController')->middleware('role:Admin');

Route::resource('mentors','MentorController')->middleware('role:Admin');

Route::resource('subjects','SubjectController')->middleware('role:Admin');

Route::resource('roles','RoleController')->middleware('role:Admin');

Route::resource('students','StudentController');

Route::resource('units','UnitController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('getBatchesByCourse','BatchController@getBatchesByCourse')->name('course.batches');

// For Mentors

Route::get('/creategroup', 'BackendController@createGroup')->name('students.group.create');

Route::post('/getstudentformembers','BackendController@getstudentformembers')->name('getstudentformembers');

Route::resource('groups','GroupController');

Route::get('grading_form/{id}','GradingController@form')->name('grading_form');

Route::get('grading_pdf/{id}','GradingController@pdf')->name('grading_pdf');

Route::resource('grading','GradingController');

Route::get('/export/{id}', 'ExportController@export')->name('export');

// nyiyelin
Route::resource('staffs','StaffController')->middleware('role:Admin');
