<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuppliersTipe extends Model
{
    	protected $table = "suppliers_tipe";
	protected $primaryKey ='id';
	protected $fillable=[
		'tipe',
		'description',
		'condicion'
	];
	protected $guarded=[
	
	];
}
