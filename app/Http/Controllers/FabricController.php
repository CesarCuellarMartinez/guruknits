<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Fabric;
use App\FabricColor;
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
    		->select('f.id','f.code','s.name as supplier','c.description as content','f.weight','f.width','f.coo','f.price','f.description')
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

    	$weun =$request->get('we_un');
    	$wiun =$request->get('wi_un');
    	$prun =$request->get('pr_un');
    	$prc =$request->get('pr_c');

    	$fabric->code=$request->get('code');
    	$fabric->supplier_id=$request->get('supplier_id');
    	$fabric->content_id=$request->get('content_id');
    	$fabric->weight=$request->get('weight').' '.$weun;
    	$fabric->width=$request->get('width').' '.$wiun;
    	$fabric->coo=$request->get('coo');
        $fabric->price=$request->get('price').' '.$prc.' '.$prun;  
        $fabric->description=$request->get('description');  
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
        $fabric=Fabric::findOrFail($id);
        $WeA = ['onze/YD2','grms/M2'];
        $WiA = ['inch','cm'];
        $puA = ['yd','lb'];
        $pcA = ['USA','E'];
        $widthA = explode(" ",$fabric->width);
        $weightA = explode(" ",$fabric->weight);
        $priceA = explode(" ",$fabric->price);

        $weightU=0;
        $widthU =0;
        $un =0;
        $cu =0;

        $weightQ = $weightA[0];
        if(sizeof($weightA) != 1)
        {
            $weightU = $weightA[1];
        }
        

        $widthQ = $widthA[0];
        if(sizeof($widthA) != 1)
        {
            $widthU = $widthA[1];
        }
        

        $pr = $priceA[0];
        if(sizeof($priceA) != 1)
        {
            $cu = $priceA[1];
            $un = $priceA[2];
        }
        
        

    	return view("adminlte::guru.fabric.edit",["pua"=>$puA ,"pca"=>$pcA ,"wia"=>$WiA,"wea"=>$WeA,"pr"=>$pr,"un"=>$un,"cu"=>$cu,"wiu"=>$widthU,"wiq"=>$widthQ,"weu"=>$weightU,"weq"=>$weightQ,"fabric"=>$fabric,"supplier"=>$supplier,"content"=>$content]);

    }
    public function update(FabricFormRequest $request, $id){
    	$fabric=Fabric::findOrFail($id);
        
        $weun =$request->get('we_un');
        $wiun =$request->get('wi_un');
        $prun =$request->get('pr_un');
        $prc =$request->get('pr_c');

    	$fabric->code=$request->get('code');
        $fabric->supplier_id=$request->get('supplier_id');
        $fabric->content_id=$request->get('content_id');
        $fabric->weight=$request->get('weight').' '.$weun;
        $fabric->width=$request->get('width').' '.$wiun;
        $fabric->coo=$request->get('coo');
        $fabric->price=$request->get('price').' '.$prc.' '.$prun;  
        $fabric->description=$request->get('description');  
    	$fabric->update();
    	return redirect('fabric')->with('message','Succesfully Updated');
    }
    public function destroy($id){
    	$fabric=Fabric::findOrFail($id);
    	$fabric->condicion='0';
    	$fabric->updated();
    	return redirect('fabric')->with('message','Succesfully Deleted');
    }

 public function destroyFabricColor($id){
    	$fabric=FabricColor::findOrFail($id);
    	$fabric->condicion='0';
    	$fabric->updated();
    	return redirect('fabric/color')->with('message','Succesfully Deleted');
    }

    public function eli($id){
        $fabric=Fabric::findOrFail($id);
        $fabric->condicion='0';
        $fabric->update();
        return redirect('fabric')->with('message','Succesfully Deleted');
    }

public function eliFabricColor($id){
        $fabric=Fabric::findOrFail($id);
        $fabric->condicion='0';
        $fabric->update();
        return redirect('fabric')->with('message','Succesfully Deleted');
    }

    public function colors($id){
    	
    	$colors = DB::table('colors')->where('condicion','=','1')->get();
    	$fc = DB::table('fabric_color as fc')
    	->join('colors as c','fc.color_id','=','c.id')
    	->select('fc.id as id','c.name as color','c.id as color_id')
    	->where('fc.fabric_id','=',$id)->get();
    	
    	return view("adminlte::guru.fabric.asignColor",["fabric"=>Fabric::findOrFail($id),"colors"=>$colors,"faco"=>$fc]);

    }

     public function fabriccolor(Request $request,$fabric_id)
    //public function fabriccolor( Request $request,$fabric_id)
    {

        $fabriccolor = new FabricColor;

        $fabriccolor->color_id = $request->get('color_id');
        //$fabriccolor->fabric_id = $fabric_id;
        $fabriccolor->fabric_id = $request->get('f');

        $fabriccolor->condicion='1';
        $fabriccolor->save();
        //El redirect es con respecto al nombre que tiene en el enrutamiento
        return redirect('fabric')->with('message','Succesfully Stored');

    }

    public function fabriccolor2(Request $request,$fabric_id)
    //public function fabriccolor( Request $request,$fabric_id)
    {

    	$fabriccolor = new FabricColor;

    	$fabriccolor->color_id = $request->$color_id;
    	$fabriccolor->fabric_id = $fabric_id;

    	$fabriccolor->condicion='1';
    	$fabriccolor->save();
        //El redirect es con respecto al nombre que tiene en el enrutamiento
    	return redirect('fabric/colors')->with('message','Succesfully Stored');

    }

}

