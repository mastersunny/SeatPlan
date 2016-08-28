<?php

class ExamRoutine extends Eloquent {
	protected $table = "exam_routine";
	protected $primaryKey = "exam_routine_id";
	protected $guarded = ['exam_routine_id']; 

	public $timestamps = false;


	public function courses()
	{
		return $this->hasMany('Course','course_id','course_id');
	}

	public function batch()
	{
		return $this->hasOne('Batch','batch_id','batch');
	}
	public function ebatch()
	{
		return $this->hasOne('Batch','batch_id','batch');
	}

	public function roomAssigned()
	{
		return $this->hasMany('RoomAssign','exam_routine_id','exam_routine_id');
	}

	


}