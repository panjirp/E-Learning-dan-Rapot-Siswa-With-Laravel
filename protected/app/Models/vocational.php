<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vocational extends Model{
	
	protected $table = 'vocational';
 	
 	protected $fillable = [
        'name',
    ];

	public function kelas()
	{
		return $this->hasMany(Kelas::class);
	}

}