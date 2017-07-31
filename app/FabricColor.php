<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FabricColor extends Model
{
     protected $table = "fabric_color";
	protected $primaryKey ='id';
	protected $fillable=[
		
		'fabric_id',
		'color_id',
		
		'condicion'
	];
	protected $guarded=[
	
	];
}
