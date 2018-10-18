<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Materi extends Model{

	protected $table ='materi';

	protected $fillable = [
        'schedule_id', 'name', 'description','url',
    ];

	public function schedule()
	{
		return $this->belongsTo(Schedule::class);
	}

	public function video()
	{
		return $this->hasMany(video::class);
	}

	public function quiz()
	{
		return $this->hasMany(quiz::class);
	}
}