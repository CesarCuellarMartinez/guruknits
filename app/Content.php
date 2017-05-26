<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = "contents";
	protected $primaryKey ='id';
	protected $fillable=[
		'descrption',
		'condicion'
	];
	protected $guarded=[

	];
}
