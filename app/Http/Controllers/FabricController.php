<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Fabric;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\FabricFormRequest;
use DB;

class FabricController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$fabric =DB::table('fabrics as f')
    		->join('suppliers as s','f.supplier_id','=','s.id')
    		->join('contents as c','f.content_id','=','c.id')
    		->select('f.id','f.code','s.name as supplier','c.description as content','f.weight','f.width','f.coo','f.price')
    		->where('code','LIKE','%'.$query.'%')
    		->orwhere('s.name','LIKE','%'.$query.'%')
    		->orwhere('c.description','LIKE','%'.$query.'%')
    		->where('f.condicion','=','1')
    		->orderBy('f.id')->paginate(7);
            //Este view si es la absoluta dentro de carpetas
    		return view('adminlte::guru.fabric.index',["fabric"=>$fabric,"searchText"=>$query]);
    	}
    }
    public function create(){
    	$supplier=DB::table('suppliers')->where('condicion','=','1')->get();
    	$content=DB::table('contents')->where('condicion','=','1')->get();
    	return view("adminlte::guru.fabric.create",["supplier"=>$supplier,"content"=>$content]);
    }
    public function store(FabricFormRequest $request){
    	$fabric = new Fabric;
    	$fabric->code=$request->get('code');
    	$fabric->supplier_id=$request->get('supplier_id');
    	$fabric->content_id=$request->get('content_id');
    	$fabric->weight=$request->get('weight');
    	$fabric->width=$request->get('width');
    	$fabric->coo=$request->get('coo');
        $fabric->price=$request->get('price');  
    	$fabric->condicion='1';
    	$fabric->save();
        //El redirect es con respecto al nombre que tiene en el enrutamiento
    	return redirect('fabric')->with('message','Succesfully Stored');
    }
    public function show($id){
    	return view("adminlte::guru.fabric.show",["fabric"=>Fabric::findOrFail($id)]);
    }
    public function edit($id){
    	
    	$supplier = DB::table('suppliers')->where('condicion','=','1')->get();
    	$content = DB::table('contents')->where('condicion','=','1')->get();
    	return view("adminlte::guru.fabric.edit",["fabric"=>Fabric::findOrFail($id),"supplier"=>$supplier,"content"=>$content]);

    }
    public function update(FabricFormRequest $request, $id){
    	$fabric=Fabric::findOrFail($id);
    	$fabric->code=$request->get('code');
    	$fabric->supplier_id=$request->get('supplier_id');
    	$fabric->content_id=$request->get('content_id');
    	$fabric->weight=$request->get('weight');
    	$fabric->width=$request->get('width');
    	$fabric->coo=$request->get('coo');
        $fabric->price=$request->get('price');  
    	$fabric->update();
    	return redirect('fabric')->with('message','Succesfully Updated');
    }
    public function destroy($id){
    	$fabric=Fabric::findOrFail($id);
    	$fabric->condicion='0';
    	$fabric->updated();
    	return redirect('fabric')->with('message','Succesfully Deleted');
    }
    public function eli($id){
        $fabric=Fabric::findOrFail($id);
        $fabric->condicion='0';
        $fabric->update();
        return redirect('fabric')->with('message','Succesfully Deleted');
    }
}
