<?php

class Course extends Eloquent {
	protected $table = "course";
	protected $guarded = ['course_id']; 

	public $timestamps = false;
}