<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Supplier;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SupplierFormRequest;
use DB;

class SupplierController extends Controller
{
     public function __construct(){

    }
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$supplier =DB::table('suppliers as s')
    		->join('suppliers_tipe as st','s.supplier_tipe_id','=','st.id')
    		->select('s.id','s.name','s.address','s.contact','s.telephone','s.country','st.tipe as tipe')
    		->where('name','LIKE','%'.$query.'%')
    		->orwhere('country','LIKE','%'.$query.'%')
    		->orwhere('st.tipe','LIKE','%'.$query.'%')
    		->where('s.condicion','=','1')
    		->orderBy('s.id')->paginate(7);
            //Este view si es la absoluta dentro de carpetas
    		return view('adminlte::guru.supplier.index',["supplier"=>$supplier,"searchText"=>$query]);
    	}
    }
    public function create(){
    	$suppliertipe=DB::table('suppliers_tipe')->where('condicion','=','1')->get();
    	return view("adminlte::guru.supplier.create",["suppliertipe"=>$suppliertipe]);
    }
    public function store(SupplierFormRequest $request){
    	$supplier = new Supplier;
    	$supplier->name=$request->get('name');
    	$supplier->address=$request->get('address');
    	$supplier->contact=$request->get('contact');
    	$supplier->telephone=$request->get('telephone');
    	$supplier->country=$request->get('country');
        $supplier->supplier_tipe_id=$request->get('supplier_tipe_id');  
    	$supplier->condicion='1';
    	$supplier->save();
        //El redirect es con respecto al nombre que tiene en el enrutamiento
    	return redirect('supplier')->with('message','Succesfully Stored');
    }
    public function show($id){
    	return view("adminlte::guru.supplier.show",["supplier"=>Supplier::findOrFail($id)]);
    }
    public function edit($id){
    	
    	$supplier_tipe_id = DB::table('suppliers_tipe')->where('condicion','=','1')->get();
    	return view("adminlte::guru.supplier.edit",["supplier"=>Supplier::findOrFail($id),"supplier_tipe_id"=>$supplier_tipe_id]);

    }
    public function update(SupplierFormRequest $request, $id){
    	$supplier=Supplier::findOrFail($id);
    	$supplier->name=$request->get('name');
    	$supplier->address=$request->get('address');
    	$supplier->contact=$request->get('contact');
    	$supplier->telephone=$request->get('telephone');
    	$supplier->country=$request->get('country');
        $supplier->supplier_tipe_id=$request->get('supplier_tipe_id');  
    	$supplier->update();
    	return redirect('supplier')->with('message','Succesfully Updated');
    }
    public function destroy($id){
    	$supplier=Supplier::findOrFail($id);
    	$supplier->condicion='0';
    	$supplier->updated();
    	return redirect('supplier')->with('message','Succesfully Deleted');
    }
    public function eli($id){
        $supplier=Supplier::findOrFail($id);
        $supplier->condicion='0';
        $supplier->update();
        return redirect('supplier')->with('message','Succesfully Deleted');
    }
}
