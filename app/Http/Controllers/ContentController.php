<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Content;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ContentFormRequest;
use DB;

class ContentController extends Controller
{
    
    public function __construct(){

    }
    public function index(Request $request){
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$content =DB::table('contents')->where('description','LIKE','%'.$query.'%')->where('condicion','=','1')->orderBy('id')->paginate(7);
            //Este view si es la absoluta dentro de carpetas
    		return view('adminlte::guru.content.index',["content"=>$content,"searchText"=>$query]);
    	}
    }
    public function create(){
    	return view("adminlte::guru.content.create");
    }
    public function store(ContentFormRequest $request){
    	$content = new Content;
    	$content->description=$request->get('description');
    	$content->condicion='1';
    	$content->save();
        //El redirect es con respecto al nombre que tiene en el enrutamiento
    	return redirect('content')->with('message','Succesfully Stored');
    }
    public function show($id){
    	return view("adminlte::guru.content.show",["content"=>Content::findOrFail($id)]);
    }
    public function edit($id){
    	return view("adminlte::guru.content.edit",["content"=>Content::findOrFail($id)]);
    }
    public function update(ContentFormRequest $request, $id){
    	$content=Content::findOrFail($id);
    	$content->description=$request->get('description');
    	$content->update();
    	return redirect('content')->with('message','Succesfully Updated');
    }
    public function destroy($id){
    	$content=Content::findOrFail($id);
    	$content->condicion='0';
    	$content->updated();
    	return redirect('content')->with('message','Succesfully Deleted');
    }
    public function eli($id){
        $content=Content::findOrFail($id);
        $content->condicion='0';
        $content->update();
        return redirect('content')->with('message','Succesfully Deleted');
    }
}
