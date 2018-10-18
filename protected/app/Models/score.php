<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model{

	protected $table ='score';

	protected $fillable = [
        'student_id', 'quiz_id', 'marks', 'precentage',
    ];

	public function quiz()
	{
		return $this->belongsTo(Quiz::class);
    }
    
    public function student()
	{
		return $this->belongsTo(Student::class);
	}

}