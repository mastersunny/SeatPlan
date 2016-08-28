<?php

class TeacherAssign extends Eloquent {
	protected $table = "teacher_assign";
	protected $guarded = ['teacher_assign_id']; 

	public $timestamps = false;


	public function teacher1()
	{
		return $this->hasMany('Teacher','teacher_id','teacher_one');
	}
	public function teacher2()
	{
		return $this->hasMany('Teacher','teacher_id','teacher_two');
	}
	public function teacherOne()
	{
		return $this->hasOne('Teacher','teacher_id','teacher_one');
	}
	public function teacherTwo()
	{
		return $this->hasOne('Teacher','teacher_id','teacher_two');
	}

}