<?php

class ExamController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /exam
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /exam/create
	 *
	 * @return Response
	 */
	public function create()
	{

		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /exam
	 *
	 * @return Response
	 */
	public function store()
	{
		$allInput = Input::all();
		$exam = new Exam;
		$exam->semester_id = $allInput['semester_id'];
		$exam->exam_type_id = $allInput['exam_type_id'];

		if($exam->save()){
			return $this->response('success');
		}
		else{
			return $this->responseError('failed');		
		}
	}

	/**
	 * Display the specified resource.
	 * GET /exam/{id}
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
	 * GET /exam/{id}/edit
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
	 * PUT /exam/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$allInput = Input::all();
		$exam = Exam::find($id);
		$exam->semester_id = $allInput['semester_id'];
		$exam->exam_type_id = $allInput['exam_type_id'];

		if($exam->save()){
			return $this->response('success');
		}
		else{
			return $this->responseError('failed');		
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /exam/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Exam::destroy($id);
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