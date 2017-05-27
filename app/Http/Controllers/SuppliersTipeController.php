<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuppliersTipe;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SuppliersTipeFormRequest;
use DB;

use App\Http\Controllers\Controller;

class SuppliersTipeController extends Controller
{
     public function __construct(){

    }
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$supplierstipe =DB::table('suppliers_tipe')->where('tipe','LIKE','%'.$query.'%')->where('condicion','=','1')->orderBy('id')->paginate(7);
            //Este view si es la absoluta dentro de carpetas
    		return view('adminlte::guru.supplierstipe.index',["supplierstipe"=>$supplierstipe,"searchText"=>$query]);
    	}
    }
    public function create(){
    	return view("adminlte::guru.supplierstipe.create");
    }
    public function store(SuppliersTipeFormRequest $request){
    	$supplierstipe = new SuppliersTipe;
    	$supplierstipe->description=$request->get('description');
    	$supplierstipe->tipe=$request->get('tipe');
    	$supplierstipe->condicion='1';
    	$supplierstipe->save();
        //El redirect es con respecto al nombre que tiene en el enrutamiento
    	return redirect('supplierstipe')->with('message','Succesfully Stored');
    }
    public function show($id){
    	return view("adminlte::guru.supplierstipe.show",["supplierstipe"=>SuppliersTipe::findOrFail($id)]);
    }
    public function edit($id){
    	return view("adminlte::guru.supplierstipe.edit",["supplierstipe"=>SuppliersTipe::findOrFail($id)]);
    }
    public function update(SuppliersTipeFormRequest $request, $id){
    	$supplierstipe=SuppliersTipe::findOrFail($id);
    	$supplierstipe->description=$request->get('description');
    	$supplierstipe->tipe=$request->get('tipe');
    	$supplierstipe->update();
    	return redirect('supplierstipe')->with('message','Succesfully Updated');
    }
    public function destroy($id){
    	$supplierstipe=SuppliersTipe::findOrFail($id);
    	$supplierstipe->condicion='0';
    	$supplierstipe->updated();
    	return redirect('supplierstipe')->with('message','Succesfully Deleted');
    }
    public function eli($id){
        $supplierstipe=SuppliersTipe::findOrFail($id);
        $supplierstipe->condicion='0';
        $supplierstipe->update();
        return redirect('supplierstipe')->with('message','Succesfully Deleted');
    }
}
