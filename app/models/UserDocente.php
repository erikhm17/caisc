<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\RemindableTrait;
use Illuminate\Auth\RemindableInterface;

class UserDocente extends Eloquent implements UserInterface, RemindableInterface{
	use UserTrait,RemindableTrait;
	public $timestamps=false;
	/**
	*The database table used by the model.
	*
	*@var string
	*/
	protected $table = 'docente';
	/**
	*the attribute excluded from the model's JSON form
	*
	*@var array
	*/
	protected $hidden = array('password','remember_token');
}