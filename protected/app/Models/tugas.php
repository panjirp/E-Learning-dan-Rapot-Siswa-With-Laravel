<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tugas extends Model{

	protected $table ='tugas';

	protected $fillable = [
        'materi_id', 'name', 'description','url',
    ];

	public function materi()
	{
		return $this->belongsTo(materi::class);
	}

}