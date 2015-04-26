<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

	protected $table = 'contacts';

	protected $fillable = [
		'firstName',
		'lastName',
		'photo',
		'birthday',
		'phone',
		'address',
		'country_id',
		'comment',
		'companies'
	];

	protected $hidden = [
		'created_at',
		'updated_at'
	];

	public function country()
	{
		return $this->belongsTo('\App\Country');
	}

	public function companies()
	{
		return $this->belongsToMany('\App\Company', 'company_contact', 'contact_id');
	}

	public function getFullNameAttribute()
	{
		return $this->firstName . ' ' . $this->lastName;
	}

}