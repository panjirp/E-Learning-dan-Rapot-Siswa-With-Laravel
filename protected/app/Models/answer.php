<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model{

	protected $table ='answer';

	protected $fillable = [
        'question_id', 'answer', 'status',
    ];

	public function question()
	{
		return $this->belongsTo(Question::class);
	}

}