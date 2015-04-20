<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

	protected $fillable = ['title', 'test'];

	protected $hidden = [
		'created_at',
		'updated_at'
	];

	public function contacts()
	{
		return $this->hasMany('\App\Contact');
	}

}