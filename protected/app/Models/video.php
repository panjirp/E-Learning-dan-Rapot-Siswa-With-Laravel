<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model{

	protected $table ='video';

	protected $fillable = [
        'materi_id', 'video',
    ];

	public function materi()
	{
		return $this->belongsTo(Materi::class);
	}

}