<?php

class Student extends Eloquent {
	protected $table = "student";
	protected $guarded = ['']; 
	protected $primaryKey  = 'student_id';

	public $timestamps = false;
}