<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model{
	
	protected $table = 'kelas';

	protected $fillable = [
        'name', 'vocational_id',
    ];

	public function student()
	{
		return $this->hasMany(Student::class);
	}

	public function teacher()
	{
		return $this->belongsTo(teacher::class);
	}

	public function schedule()
	{
		return $this->hasMany(Schedule::class);
	}

	public function vocational()
	{
		return $this->belongsTo(Vocational::class);
	}

}