<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = "purchase";
	protected $primaryKey ='id';
	protected $fillable=[
		'po',
		'supplier_id',
		'purchase_date',
		'delivery_date',
		'coments',
		'condicion'
	];
	protected $guarded=[

	];
}
