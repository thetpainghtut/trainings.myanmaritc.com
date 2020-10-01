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

// Frontend
Route::get('/','FrontendController@index')->name('frontend.index');
Route::get('allcourses','FrontendController@courses')->name('frontend.courses');
Route::get('csr','FrontendController@csr')->name('frontend.csr');
Route::get('contact','FrontendController@contact')->name('frontend.contact');

// Frontend V2
Route::get('blogs','FrontendController@blogs')->name('frontend.blogs');
Route::get('blog_detail/{id}','FrontendController@blog_detail')->name('frontend.blog_detail');

Route::post('oldstduent','FrontendController@oldstduent')->name('oldstduent');


// nyiyelin
Route::post('update_password','FrontendController@update_password')->name('frontend.update_password');

Route::post('student_profile_update','FrontendController@student_profile_update')->name('frontend.student_profile_update');

Route::post('secret_password_change','FrontendController@secret_password_change')->name('frontend.secret_password_change');




//Honey Htun
Route::get('inquire_no','FrontendController@inquire_no')->name('frontend.inquire_no');

//Yathaw
Route::get('phpbootcamp', 'FrontendController@phpbootcamp_reg');
Route::get('japanitbootcamp', 'FrontendController@japanitbootcamp_reg');
Route::get('androidbootcamp', 'FrontendController@androidbootcamp_reg');
Route::get('hradmin', 'FrontendController@hradmin_reg');
Route::get('fundamental', 'FrontendController@fundamental_reg');
Route::get('python', 'FrontendController@python_reg');
Route::get('ios', 'FrontendController@ios_reg');
Route::get('japanese', 'FrontendController@japanese_reg');

Route::post('student_register','FrontendController@studentRegister')->name('frontend.student.register');


Route::get('course_detail/{id}','FrontendController@course_detail')->name('course_detail');

Route::get('course_detail_bycodeno/{codeno}','FrontendController@course_detail_bycodeno')->name('course_detail_bycodeno');

Route::post('getBatches','InquireController@getBatches')->name('get.batches');

Route::get('dashboard',function (){
  return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::resource('courses','CourseController')->middleware('role:Admin');

Route::resource('batches','BatchController');

Route::resource('mentors','MentorController');

Route::resource('subjects','SubjectController');
Route::post('subject_course','SubjectController@subject_course');


Route::resource('roles','RoleController')->middleware('role:Admin');

Route::resource('students','StudentController');

// nyiyelin
Route::post('resend_mail','StudentController@resend_mail')->name('resend_mail');
Route::post('student_status_change','StudentController@student_status_change')->name('student_status_change');


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

Route::post('postpone','InquireController@postpone')->name('postpone.store');

Route::get('postpone_list/{id}','InquireController@postpone_list')->name('postpone_list');

//Monthly Report
Route::get('/export/{month}/{year}', 'ExportController@monthlyreport')->name('monthlyreport');
Route::get('/report', 'ReportController@report')->name('report');
Route::post('/detailsearch','ReportController@detailsearch')->name('detailsearch');

//Attendance
Route::resource('/attendances','AttendanceController');
Route::get('/attendances_search/action', 'AttendanceController@action')->name('attendances_search.action');
Route::get('/absence','AttendanceController@absence')->name('absence');
Route::get('/absencesearch/action','AttendanceController@absencesearch')->name('absencesearch.action');
Route::get('absence/{id}/print/{date}','PrintController@absence')->name('absenceprint');

// Grade Print
Route::resource('grades','GradingController');
Route::get('grade_print/{id}','PrintController@grade');

/*Route::get('/attendances/collection', 'AttendanceController@attendanceCollect')->name('attendances.collect');
Route::get('/attendances/reports', 'AttendanceController@attendanceReport')->name('attendances.reports');
Route::get('/attendances/export/{section_id}','AttendanceController@Export');*/




// Version(2.0)
Route::resource('lessons','LessonController');
Route::post('show_subject','LessonController@show_subject')->name('show_subject');
Route::get('view_lesson/{id}','LessonController@view_lesson')->name('view_lesson');
//Honey
Route::post('assign_batchsubject','LessonController@assign_batchsubject')->name('assign_batchsubject');

Route::resource('topics','TopicController');
Route::resource('posts','PostController');
Route::resource('projecttypes','ProjecttypeController');
Route::resource('projects','ProjectController');
Route::resource('journals','JournalController');
Route::resource('feedbacks','FeedbackController');

// Student Dashboard
Route::get('panel','PanelController@index')->name('frontend.panel');
Route::get('takelesson/{id}','PanelController@takelesson')->name('frontend.takelesson');

Route::get('channel/{id}','PanelController@channel')->name('frontend.channel');
Route::post('allchannel','PanelController@allchannel')->name('allchannel');

Route::get('takequiz','PanelController@takequiz')->name('frontend.takequiz');
Route::get('quizanswer','PanelController@quizanswer')->name('frontend.quizanswer');

Route::get('secret','PanelController@secret')->name('frontend.secret');
Route::get('account','PanelController@account')->name('frontend.account');
Route::get('notification','PanelController@notification')->name('frontend.notification');

//Honey
Route::post('lesson_student','PanelController@lesson_student')->name('lesson_student');

// nyiyelin
Route::get('change_password','PanelController@change_password')->name('frontend.change_password');
Route::get('forgetpassword','PanelController@forgetpassword')->name('frontend.forgetpassword');
Route::post('resetpassword','PanelController@resetpassword')->name('frontend.resetpassword');
Route::get('resetandeditpassword','PanelController@resetandeditpassword')->name('frontend.resetandeditpassword');
Route::post('resetupdatepassword','PanelController@resetupdatepassword')->name('frontend.resetupdatepassword');







// Route::get('playcourse/{sid}/{bid}','PanelController@playcourse')->name('frontend.playcourse');

Route::get('playcourse/{bid}/{sid}', [
    'as' => 'frontend.playcourse', 
    'uses' => 'PanelController@playcourse'
]);


Route::post('postassign','PostController@postassign')->name('postassign');
Route::post('assingpttype','ProjecttypeController@assingpttype')->name('assingpttype');
Route::post('assignproduct','PostController@assignproduct')->name('assignproduct');
Route::post('projecttitle','PanelController@projecttitle')->name('projecttitle');

Route::get('/getnoti', 'PostController@getnoti')->name('getnoti');
Route::post('notiread','PanelController@notiread')->name('notiread');