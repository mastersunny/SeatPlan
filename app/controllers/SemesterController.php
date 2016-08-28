<?php

class SemesterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /semester
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /semester/create
	 *
	 * @return Response
	 */
	public function store()
	{
	
		$allInput = Input::all();
		$semester = new Semester;
		$semester->session = $allInput['session'];
		$semester->year = date('Y');
		$semester->start_date = $allInput['start_date'];
		$semester->end_date = $allInput['end_date'];
		if($semester->save()){
			return $this->response('success');
		}
		else{
			return $this->responseError('failed');		
		}
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /semester
	 *
	 * @return Response
	 */


	/**
	 * Display the specified resource.
	 * GET /semester/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function checkRoom()
	{
		
		$start_time = Input::get('start_time');
		$end_time = Input::get('end_time');
		
		$exam_routine_ids = ExamRoutine::where('start_time' ,'<=',$start_time)
		->where('end_time' ,'>=',$start_time)
		->where('date',Input::get('date'))
		->orWhere('start_time' ,'<=',$end_time)
		->where('end_time' ,'>=',$end_time)
		->where('date',Input::get('date'))->orWhere('start_time' ,'>=',$start_time)
		->where('end_time' ,'<=',$end_time)
		->where('date',Input::get('date'))->lists('exam_routine_id');
		
		$available = Room::whereNotIn('room_id', RoomAssign::whereIn('exam_routine_id', $exam_routine_ids)->lists('room_id'))->get();;
		$teachers = Teacher::get();
		$data['available'] = $available;
		$data['teachers'] = $teachers;
		
		return $data;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /semester/{id}/edit
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
	 * PUT /semester/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$allInput = Input::all();
		$semester = Semester::find($id);
		$semester->session = $allInput['session'];
		$semester->year = date('Y');
		$semester->start_date = $allInput['start_date'];
		$semester->end_date = $allInput['end_date'];
		if($semester->save()){
			return $this->response('success');
		}
		else{
			return $this->responseError('failed');		
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /semester/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Semester::destroy($id);
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