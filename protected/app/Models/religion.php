<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model{
	
	protected $table = 'religion';

	public function teacher()
	{
		return $this->hasMany(Teacher::class);
	}

	public function student()
	{
		return $this->hasMany(Student::class);
	}

}