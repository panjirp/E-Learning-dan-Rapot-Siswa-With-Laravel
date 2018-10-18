<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model{

	protected $table ='quiz';

	protected $fillable = [
        'materi_id', 'name', 'total_question', 'time',
    ];

	public function materi()
	{
		return $this->belongsTo(Materi::class);
	}

    public function question()
	{
		return $this->hasMany(question::class);
    }
    
    public function score()
	{
		return $this->hasMany(Score::class);
	}

}