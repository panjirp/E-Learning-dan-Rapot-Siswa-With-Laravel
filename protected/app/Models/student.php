<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Student extends Model{

	protected $table ='student';

	protected $fillable = [
        'fullname', 'nis', 'birth_date', 'kelas_id', 'entry_year', 'status_id', 'birth_place', 'religion_id', 'sex_id', 'phone_number', 'address',
    ];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function kelas()
	{
		return $this->belongsTo(Kelas::class);
	}

	public function religion()
	{
		return $this->belongsTo(Religion::class);
	}

	public function sex()
	{
		return $this->belongsTo(Sex::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function nilai()
	{
		return $this->hasMany(Nilai::class);
	}

	public function catatansiswa()
	{
		return $this->hasMany(catatansiswa::class);
	}

	public function score()
	{
		return $this->hasMany(Score::class);
	}
}