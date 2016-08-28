<?php

class Room extends Eloquent {
	protected $table = "room";
	protected $guarded = ['room_id']; 

	public $timestamps = false;
}