<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



//Retrieving data portion








Route::get('/faculty','UsersController@showTeachersList');
Route::get('/academic','UsersController@showAcademic');
Route::get('/contact','UsersController@showContact');
	
Route::group(['before' => 'guest'], function(){
	// Route::controller('password', 'RemindersController');
	Route::post('login', ['as'=>'login','uses' => 'UsersController@doLogin']);
	Route::post('/createAccount', 'UsersController@doRegister');
	Route::get('/',['as' => 'home', function()
	{
		$exams = Exam::where('id',2)->get();
		return View::make('users.home')->with('exams',$exams);
	}]);
	

	// Route::post('login', array('uses' => 'AuthController@doLogin'));
});

Route::group(array('before' => 'auth'), function()
{
	Route::group(array('before' => 'admin', 'prefix' => 'admin'), function()
	{
		Route::get('/', ['as'=>'admin','uses'=>'UsersController@admin']);
		Route::get('/exam', ['as'=>'admin.exam','uses'=>'UsersController@exam']);
		Route::get('/routine/{id}', ['as'=>'admin.routine','uses'=>'UsersController@routine']);
		
		Route::post('semester/store' , 'SemesterController@store');
		Route::post('semester/update/{id}' , 'SemesterController@update');
		Route::delete('semester/delete/{id}' , 'SemesterController@destroy');

		Route::post('exam/store' , 'ExamController@store');
		Route::post('exam/update/{id}' , 'ExamController@update');
		Route::delete('exam/delete/{id}' , 'ExamController@destroy');

		Route::post('examRoutine/store' , 'ExamRoutineController@store');
		Route::post('examRoutine/update/{id}' , 'ExamRoutineController@update');
		Route::delete('examRoutine/delete/{id}' , 'ExamRoutineController@destroy');


		// Route::get('/createExamRoutine/{exam_id}','InputController@examRoutine');

		Route::get('/checkRoom' , 'SemesterController@checkRoom');

		// Route::get('/getroom/{date}/{start_time}/{end_time}', 'InputController@getroom');
	});
	// Route::group(array('before' => 'teacher'), function()
	// {
		
		Route::get('/registeredStudents/{course_id}/{semester_id}', 'StudentController@getRegisteredStudents');

		Route::get('/saveStudentsAttendence/{exam_routine_id}', 'StudentController@saveStudentsAttendence');

	// });

	Route::get('dashboard', ['as'=>'dashboard','uses'=>'UsersController@dashboard']);
	



	Route::get('/student/{user_id}','UsersController@showStudentList');

	Route::get('/examTypeList','UsersController@showExamTypeList');
	
	Route::get('/examList','UsersController@showCurrentExamList');

	Route::get('/exam/{exam_id}','UsersController@showExam');

	Route::get('/examRoutine/{exam_id}','UsersController@showExamRoutine');

	Route::get('/examRoutine/{exam_id}/{batch_id}','UsersController@showExamRoutineStudent');

	Route::get('/teacherProfile/{id}', 'UsersController@showTeacherProfile');

	Route::get('/studentProfile/{id}','UsersController@showStudentProfile');

	Route::get('/examInput', 'InputController@showExamInput');

	

	//Input data portion 

	// Route::post('/createExam','InputController@createExam');
    


	


});
Route::get('/logout', function(){
		Auth::logout();
		Session::flush();
		return Redirect::to("/");
	});