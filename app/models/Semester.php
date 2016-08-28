<?php

class Semester extends \Eloquent {
	protected $fillable = [];
	public $timestamps = false;
	public function exams()
	{
		return $this->hasMany('Exam', 'semester_id', 'id');
	}
}