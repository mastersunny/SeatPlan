<?php

class StudentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /student
	 *
	 * @return Response
	 */
	public function getRegisteredStudents($course_id, $semeseter_id)
	{
		$registeredStudentList = CourseReg::whereCourseId($course_id)->whereSemesterId($semeseter_id)->lists('student_id');
		return Student::whereIn('student_id', $registeredStudentList)->get();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /student/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	public function saveStudentsAttendence($exam_routine_id)
	{
		// return Input::get('student');
		$students = json_decode(Input::get('student'));
		
		foreach ($students as $student) {
			$attendence = new Attendence();
			$attendence->student_id = $student->roll;
			$attendence->exam_routine_id = $exam_routine_id;
			$attendence->present = $student->flag;
			$attendence->save();
			// echo $student;
		}
		return Response::json(['data' => 'success']);
	}
	
	/**
	 * Store a newly created resource in storage.
	 * POST /student
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /student/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /student/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /student/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /student/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}