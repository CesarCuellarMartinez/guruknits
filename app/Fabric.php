<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
     protected $table = "fabrics";
	protected $primaryKey ='id';
	protected $fillable=[
		'code',
		'content_id',
		'supplier_id',
		'weight',
		'width',
		'coo',
		'price',
		'condicion'
	];
	protected $guarded=[
	
	];
}
