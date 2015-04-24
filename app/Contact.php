<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Contact extends Model
{

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
		return $this->belongsToMany('\App\Company');
	}

}