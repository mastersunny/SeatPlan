<?php

class Exam extends Eloquent {
	

	public $timestamps = false;
	public function examRoutines()
	{
		return $this->hasMany('ExamRoutine');
	}
	public function examType()
	{
		return $this->hasOne('ExamType', 'id', 'exam_type_id');
	}
	public function semester()
	{
		return $this->hasOne('Semester', 'id', 'semester_id');
	}
}