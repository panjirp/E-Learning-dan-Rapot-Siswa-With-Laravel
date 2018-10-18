<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model{

	protected $table ='question';

	protected $fillable = [
        'quiz_id', 'question',
    ];

	public function quiz()
	{
		return $this->belongsTo(Quiz::class);
	}

    public function answer()
	{
		return $this->hasMany(answer::class);
	}

}