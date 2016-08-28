<?php

class ExamRoutineController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /examroutine
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /examroutine/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /examroutine
	 *
	 * @return Response
	 */
	public function store()
	{
		$allInput = json_decode(Input::get('data'));

		$exam_routine = new ExamRoutine;
		$exam_routine->date = $allInput->date;
		$exam_routine->start_time = $allInput->start_time;
		$exam_routine->end_time = $allInput->end_time;
		$exam_routine->batch = $allInput->batch;
		$exam_routine->exam_id = $allInput->exam_id;
		$exam_routine->course_id = $allInput->course_id;
		$start = Batch::find($allInput->batch)->start_reg;		
		if($exam_routine->save()){

			foreach ($allInput->rooms as $room) {
				$end = $start+35;

				$roomAssign = new RoomAssign;
				$roomAssign->exam_routine_id = $exam_routine->exam_routine_id;
				$roomAssign->room_id = $room->id;
				$roomAssign->start_registration = $start;
				$roomAssign->end_registration = $end;
				$roomAssign->save();
				$teacher_assign = new TeacherAssign;
				$teacher_assign->teacher_one = $room->teacher1;
				$teacher_assign->teacher_two = $room->teacher2;
				$teacher_assign->room_assign_id = $roomAssign->id;
				$teacher_assign->save();
				$start = $end+1;
			}
			return $this->response('success');
		}
		else{
			return $this->responseError('failed');		
		}
	}

	/**
	 * Display the specified resource.
	 * GET /examroutine/{id}
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
	 * GET /examroutine/{id}/edit
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
	 * PUT /examroutine/{id}
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
	 * DELETE /examroutine/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		ExamRoutine::destroy($id);
		return $this->response('success');
	}
	public function response($message, $code = 200){
		$data = [
			'data' => $message,
			'code' => $code
		];
		return Response::json($data, $code);
	}
	public function responseError($message, $code = 400){
		$data = [
			'error' => $message,
			'code' => $code
		];
		return Response::json($data, $code);
	}
}