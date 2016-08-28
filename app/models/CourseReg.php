<?php

class Coursereg extends Eloquent {
	protected $table = "course_reg";
	protected $guarded = ['course_reg_id']; 

	public $timestamps = false;
}