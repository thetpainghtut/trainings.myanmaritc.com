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

//honey
Route::post('student_register','FrontendController@studentRegister')->name('frontend.student.register');

Route::get('allcourses','FrontendController@courses')->name('frontend.courses');

Route::get('csr','FrontendController@csr')->name('frontend.csr');

Route::get('contact','FrontendController@contact')->name('frontend.contact');

Route::get('dashboard',function (){
  return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::resource('courses','CourseController');

Route::resource('batches','BatchController');

Route::resource('mentors','MentorController');

Route::resource('subjects','SubjectController');

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

Route::resource('staffs','StaffController');

Route::post('changepassword/{id}','StaffController@changepassword')->name('changepassword');

Route::post('all_staff','StaffController@all_staff')->name('all_staff');

Route::post('status_change/{id}','StaffController@status_change')->name('status_change')->middleware('role:Admin');

Route::post('show_mentor','MentorController@show_mentor')->name('show_mentor');

Route::post('show_batch','BatchController@show_batch')->name('show_batch');


Route::resource('teacher','TeacherController')->middleware('role:Admin');


//Income
Route::resource('/incomes','IncomeController');

//Expense
Route::resource('/expenses','ExpenseController');

///Honey
Route::resource('inquires','InquireController');

Route::post('installment','InquireController@preinstallment')->name('installment.store');
Route::post('full_installment','InquireController@fullinstallment')->name('fullinstallment.store');



//Monthly Report
Route::get('/export/{month}/{year}', 'ExportController@monthlyreport')->name('monthlyreport');
Route::get('/report', 'ReportController@report')->name('report');
Route::post('/detailsearch','ReportController@detailsearch')->name('detailsearch');



//Attendance
Route::resource('/attendances','AttendanceController');
Route::get('/attendances_search/action', 'AttendanceController@action')->name('attendances_search.action');
Route::get('/absence','AttendanceController@absence')->name('absence');
Route::get('/absencesearch/action','AttendanceController@absencesearch')->name('absencesearch.action');

// Grade Print
Route::resource('grades','GradingController');
Route::get('grade_print/{id}','PrintController@grade');

/*Route::get('/attendances/collection', 'AttendanceController@attendanceCollect')->name('attendances.collect');
Route::get('/attendances/reports', 'AttendanceController@attendanceReport')->name('attendances.reports');
Route::get('/attendances/export/{section_id}','AttendanceController@Export');*/
