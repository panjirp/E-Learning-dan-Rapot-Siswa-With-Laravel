<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model{
	
	protected $table = 'nilai';

	protected $fillable = [
        'subject_name','subjecttype_id','schedule_id', 'student_id','teacher_id','tahun_ajaran','semester','kelas_name','nilai_ujian','attitude','kkm_nu','kkm_ns'
    ];

	public function student()
	{
		return $this->belongsTo(Student::class);
	}

	public function teacher()
	{
		return $this->belongsTo(Teacher::class);
	}

	public function schedule()
	{
		return $this->belongsTo(Schedule::class);
	}

	public function subjecttype()
	{
		return $this->belongsTo(Subjecttype::class);
	}
}