<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{
	
	protected $table = 'users';

	public function student()
	{
		return $this->hasMany(Student::class);
	}

	public function teacher()
	{
		return $this->hasMany(Teacher::class);
	}

}