<?php

class Teacher extends Eloquent {
	protected $table = "teacher";
	protected $guarded = ['']; 
	protected $primaryKey  = 'teacher_id';
	public $timestamps = false;

	public function teacherDesignation()
	{
		return $this->hasOne('Designation','desig_id','desig_id');
	}
}