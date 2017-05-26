<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Color;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ColorFormRequest;
use DB;


class ColorController extends Controller
{
    
    public function __construct(){

    }
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$color =DB::table('colors')->where('name','LIKE','%'.$query.'%')->where('condicion','=','1')->orderBy('id','name')->paginate(7);
            //Este view si es la absoluta dentro de carpetas
    		return view('adminlte::guru.color.index',["color"=>$color,"searchText"=>$query]);
    	}
    }
    public function create(){
    	return view("adminlte::guru.color.create");
    }
    public function store(ColorFormRequest $request){
    	$color = new Color;
    	$color->name=$request->get('name');
    	$color->condicion='1';
    	$color->save();
        //El redirect es con respecto al nombre que tiene en el enrutamiento
    	return redirect('color')->with('message','Succesfully Stored');
    }
    public function show($id){
    	return view("adminlte::guru.color.show",["color"=>Color::findOrFail($id)]);
    }
    public function edit($id){
    	return view("adminlte::guru.color.edit",["color"=>Color::findOrFail($id)]);
    }
    public function update(ColorFormRequest $request, $id){
    	$color=Color::findOrFail($id);
    	$color->name=$request->get('name');
    	$color->update();
    	return redirect('color')->with('message','Succesfully Updated');
    }
    public function destroy($id){
    	$color=Color::findOrFail($id);
    	$color->condicion='0';
    	$color->updated();
    	return redirect('color')->with('message','Succesfully Deleted');
    }
    public function eli($id){
        $color=Color::findOrFail($id);
        $color->condicion='0';
        $color->update();
        return redirect('color')->with('message','Succesfully Deleted');
    }
}
