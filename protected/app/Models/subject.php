<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model{
	
	protected $table = 'subject';

	protected $fillable = [
        'name','subjecttype_id'
    ];

	public function schedule()
	{
		return $this->hasMany(Schedule::class);
	}

	public function subjecttype()
	{
		return $this->belongsTo(Subjecttype::class);
	}

}