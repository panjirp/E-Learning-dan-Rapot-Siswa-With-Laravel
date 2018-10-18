<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model{
	
	protected $table = 'sex';

	public function teacher()
	{
		return $this->hasMany(Teacher::class);
	}

	public function student()
	{
		return $this->hasMany(Student::class);
	}

}