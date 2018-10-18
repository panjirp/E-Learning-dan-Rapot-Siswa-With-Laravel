<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model{
	
	protected $table = 'schedule';

	protected $fillable = [
        'subject_id','kelas_id','teacher_id'
    ];

	public function teacher()
	{
		return $this->belongsTo(Teacher::class);
	}

	public function subject()
	{
		return $this->belongsTo(Subject::class);
	}

	public function kelas()
	{
		return $this->belongsTo(Kelas::class);
	}

	public function nilai()
	{
		return $this->hasMany(Nilai::class);
	}

}