<?php

class Designation extends Eloquent {
	protected $table = "designation";
	protected $guarded = ['desig_id']; 

	public $timestamps = false;

}