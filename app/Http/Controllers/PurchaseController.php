<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
use Response;
use Auth;
use Illuminate\Support\Collection;
use App\Fabric;
use App\FabricColor;
use App\Supplier;
use App\Color;
class PurchaseController extends Controller
{
    public function __construct(){

    }
    //private $id_hora;
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$purchase=DB::table('purchase as p')
    		->join('suppliers as s','p.supplier_id','=','s.id')
    		->select('p.id','p.po','s.name','p.purchase_date','p.delivery_date')
    		->where('p.id','LIKE','%'.$query.'%')
    		->groupBy('p.id','p.po','s.name','p.purchase_date','p.delivery_date')
    		->paginate(7);
             $id_usua=Auth::id();
    		return view('adminlte::guru.purchase.index',["purchase"=>$purchase,"searchText"=>$query,"id_usua"=>$id_usua]);
    	}
    }
    public function create(){
    	$fabric_color=DB::table('fabric_color as fc')
    	->join('fabrics as f','fc.fabric_id','=','f.id')
    	->join('colors as c','fc.color_id','=','c.id')
    	->join('suppliers as s','f.supplier_id','=','s.id')
    	->select('fc.id','f.code','c.name as color','s.name','f.price')
    	->where('fc.condicion','=','1')->get();
    	$supplier=DB::table('suppliers')->where('condicion','=','1')->get();
    	return view("adminlte::guru.purchase.create",["supplier"=>$supplier,"fabric_color"=>$fabric_color]);
    }
}
