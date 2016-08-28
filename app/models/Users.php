<?php

class Users extends Eloquent {
	protected $table = "user";
	protected $guarded = ['user_id']; 

	public $timestamps = false;
}