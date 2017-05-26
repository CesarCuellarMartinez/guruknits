<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
  	protected $table = "colors";
	protected $primaryKey ='id';
	protected $fillable=[
		'name',
		'condicion'
	];
	protected $guarded=[

	];
}
