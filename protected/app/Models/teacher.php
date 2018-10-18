<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Teacher extends Model{

	protected $table ='teacher';

	protected $fillable = [
        'fullname', 'nip', 'birth_date', 'birth_place', 'religion_id', 'sex_id', 'phone_number', 'address',
    ];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function schedule()
	{
		return $this->hasMany(Schedule::class);
	}

	public function religion()
	{
		return $this->belongsTo(Religion::class);
	}

	public function sex()
	{
		return $this->belongsTo(Sex::class);
	}

	public function kelas()
	{
		return $this->hasMany(Kelas::class);
	}

	public function nilai()
	{
		return $this->hasMany(Nilai::class);
	}

	public function catatansiswa()
	{
		return $this->hasMany(catatansiswa::class);
	}
}