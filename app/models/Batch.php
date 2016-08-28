<?php

class Batch extends Eloquent {
	protected $table = "batch";
	protected $primaryKey  = 'batch_id';
	protected $guarded = ['batch_id']; 

	public $timestamps = false;
}