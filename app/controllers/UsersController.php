<?php

class UsersController extends BaseController
{
	public function doLogin()
	{
		// return 'ok';
		$rules = array
		(
					'username'    => 'required',
					'password' => 'required'
		);
		$allInput = Input::all();
		$validation = Validator::make($allInput, $rules);

		//dd($allInput);


		if ($validation->fails())
		{
			return Redirect::route('home')
						->withInput()
						->withErrors($validation);
		} else
		{

			$credentials = array
			(
						'username'    => Input::get('username'),
						'password' => Input::get('password')
				
			);
			// $username=Input::get('username');
			// $password=Input::get('password');
			// return $password;
			// return Auth::attempt($credentials).'';
			if (Auth::attempt($credentials))
			{
				return Redirect::route('dashboard');
			} else
			{
				return Redirect::route('home')
							->withInput()
							->withErrors('Error in username Address or Password.');
			}
		}
	}
	public function dashboard()
	{
		// return 'ok';
		$year = date('Y');
		$exams = Semester::with('exams','exams.examType')->where('year',$year)->get();
		// $exams = Exam::with(examType')->whereIn('semester_id',$semester_ids)->get();
	

		$student = Student::where('user_id',Auth::user()->user_id)->first();
		//return $student;
		if($student)
		{

			Session::put('role', 'student');
			return View::make('users.students')->with('student',$student)
						->with('exams',$exams);
		}
		else
		{
			if(Auth::user()->username == "mak"){
				Session::put('role', 'admin');

			}
			else {
				Session::put('role', 'teacher');
			}
			$teacher = Teacher::with('teacherDesignation')
								->where('user_id',Auth::user()->user_id)->first();
			

            

			return View::make('users.teachers')->with('teacher',$teacher)
											->with('exams',$exams);
		}
		//return View::make('users.profile')->with('users',$users);

	}
	public function doRegister()
	{
		$rules = [
			// 'name' => 'required',
			'username' => 'required|unique:user,username',
			'password' => 'required'
			// 'confirm_password' => 'required|same:password',
			// 'mobile' => 'required',
			// 'g-recaptcha-response' => 'required',

		];

		$data = Input::all();
		$validator = Validator::make($data, $rules);

		// handles if validation fails

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$student = Student::whereRegNo($data['username'])->first();
		$teacher = Teacher::whereTeacherCode($data['username'])->first();
		if($student || $teacher){
			$user = new User();
			$user->username = $data['username'];
			$user->password = Hash::make($data['password']);
			$user->save();
			if($student){
				$student->user_id = $user->user_id;
				$student->save();
				return Redirect::route('home')->with('success',"Your account has been created successfully, Please Login");

			}
			$teacher->user_id = $user->user_id;
			$teacher->save();
			return Redirect::route('home')->with('success',"Your account has been created successfully, Please Login");
			
		}

		return Redirect::back()->withInput()->withErrors('Invalid Registraion Number or Teacher Code');
		

		

	} 

	public function showTeachersList()
	{
		$teachers = Teacher::all();
		return View::make('users.faculty_members')->with('teachers', $teachers);
		
	}


	//It will show all student lsit 

	public function showStudentList($userid)
	{
		return $student = Student::where('user_id',$userid)->get();	
	}

	//Show all upcoming exam list using a year like fall 2015
	public function showExamTypeList()
	{
		// $year = date('Y');


		return $exams = ExamType::get();
	}
	public function showCurrentExamList()
	{
		$year = date('Y');
		$semester_ids = Semester::where('year',$year)->lists('id');
		return $exams = Exam::with('examType')->whereIn('semester_id',$semester_ids)->get();
	}

	//Show a selected exam using it's exam id

	public function showExam($exam_id)
	{
				return $exams = Exam::where('exam_id',$exam_id)->get();
	}


	//Showing full exam routines data using a particular exam id

	public function showExamRoutine($exam_id)
	{
		return Exam::with(['examRoutines.courses','examRoutines.batch','examRoutines.roomAssigned.rooms','examRoutines.roomAssigned.teachersAssign','examRoutines.roomAssigned.teachersAssign.teacher1','examRoutines.roomAssigned.teachersAssign.teacher2'])
		->where('id',$exam_id)
			->get();
	}

	public function showExamRoutineStudent($exam_id, $batch_id)
	{

		$GLOBALS['ids'] = $examroutine = ExamRoutine::whereBatch($batch_id)->lists('exam_routine_id');
		$GLOBALS['room_assigned_ids'] = RoomAssign::where('start_registration','<=', Auth::user()->username)->where('end_registration','>=', Auth::user()->username)->lists('room_assign_id');
		return Exam::with([ 'examRoutines' => function($query)
{
    $query->whereIn('exam_routine_id', $GLOBALS['ids']);

},'examRoutines.courses','examRoutines.batch','examRoutines.roomAssigned'=> function($query)
{
    $query->whereIn('room_assign_id', $GLOBALS['room_assigned_ids']);

},'examRoutines.roomAssigned.rooms','examRoutines.roomAssigned.teachersAssign','examRoutines.roomAssigned.teachersAssign.teacher1','examRoutines.roomAssigned.teachersAssign.teacher2'])
		->where('id',$exam_id)
			->get();
	}
	//Showing particulars teacher's info 

	public function showTeacherProfile($userid)
	{
		return $teacher = Teacher::where('user_id',$userid)->first();		
	}


	//Showing particular student profile using user id


	public function showStudentProfile($userid)
	{
		return $student = Student::where('user_id', $userid)->get();
	}



	public function admin(){
		$year = date('Y');
		$exam_types = ExamType::get();

		$semesters = Semester::where('year',$year)->get();

		$courses = Course::get();

		$batches = Batch::get();

		$teachers = Teacher::get();
		
		$semester_ids = Semester::where('year',$year)->lists('id');
		$exams = Exam::with('semester','examType')->whereIn('semester_id', $semester_ids)->get();

		return View::make('users.semester',compact(['exam_types','courses','batches','teachers','semesters','exams' ]));
	}
	public function exam(){
		$year = date('Y');
		$exam_types = ExamType::get();

		$semesters = Semester::where('year',$year)->get();

		$courses = Course::get();

		$batches = Batch::get();

		$teachers = Teacher::get();
		
		$semester_ids = Semester::where('year',$year)->lists('id');
		$exams = Exam::with('semester','examType')->whereIn('semester_id', $semester_ids)->get();

		return View::make('users.exam',compact(['exam_types','courses','batches','teachers','semesters','exams' ]));
	}
	public function routine($id){




		$year = date('Y');
		$exam_types = ExamType::get();
		 $eroutine = Exam::with(['examRoutines.courses','examRoutines.ebatch','examRoutines.roomAssigned.rooms','examRoutines.roomAssigned.teacherAssign','examRoutines.roomAssigned.teacherAssign.teacherOne','examRoutines.roomAssigned.teacherAssign.teacherTwo'])
		->where('id',$id)->first();
		// foreach ($exam->exam_routines as $exam_routine) {
		// 	return $exam_routine->room_assigned;
			
		// }


		$semesters = Semester::where('year',$year)->get();
		// $semesters = ExamRoutine::where('year',$year)->get();
		$courses = Course::get();

		$batches = Batch::get();

		$teachers = Teacher::get();
		
		$semester_ids = Semester::where('year',$year)->lists('id');
		$exams = Exam::with('semester','examType')->whereIn('semester_id', $semester_ids)->get();

        
		return View::make('users.routine',compact(['exam_types','courses','batches','teachers','semesters','exams','eroutine' ]));
	}

	 public function showAcademic(){

	 	return View::make('users.academic');
	 }

	 public function showContact(){

	 	return View::make('users.contact');
	 }

}