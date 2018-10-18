<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjecttype extends Model{
	
	protected $table = 'schedule';

	protected $fillable = [
        'desc'
    ];

	public function subject()
	{
		return $this->hasMany(Schedule::class);
	}

	public function nilai()
	{
		return $this->hasMany(Nilai::class);
	}

}