<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catatansiswa extends Model{

	protected $table ='catatansiswa';

	protected $fillable = [
        'student_id', 'kelas_name', 'semester', 'teacher_id', 'kebersihan', 'kerapihan', 'ibadah', 'kesantunan', 'sakit', 'ijin', 'tanpa_keterangan', 'membolos','tuntas','lulus'
    ];

	public function student()
	{
		return $this->belongsTo(Student::class);
	}

	public function teacher()
	{
		return $this->belongsTo(Teacher::class);
	}

}