<?php

class RoomAssign extends Eloquent {
	protected $table = "room_assign";
	protected $guarded = ['room_assign_id']; 

	public $timestamps = false;

	public function rooms()
	{
		return $this->hasMany('Room','room_id','room_id');
	}

	public function room()
	{
		return $this->hasOne('Room','room_id','room_id');
	}
	public function teachersAssign()
	{
		return $this->hasMany('TeacherAssign','room_assign_id','room_assign_id');
	}
	public function teacherAssign()
	{
		return $this->hasOne('TeacherAssign','room_assign_id','room_assign_id');
	}
}