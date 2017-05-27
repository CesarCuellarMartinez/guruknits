<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "suppliers";
	protected $primaryKey ='id';
	protected $fillable=[
		'name',
		'address',
		'contact',
		'telephone',
		'cuntry',
		'supplier_tipe_id',
		'condicion'
	];
	protected $guarded=[
	
	];
}
