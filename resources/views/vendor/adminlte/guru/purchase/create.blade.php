@extends('adminlte::layouts.app')
@section('encabezado')
	New Purchase
@endsection
@section('main-content')
	<div class="row">
		
			@if(count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<!--El url es de las rutas-->
			{!!Form::open(array('url'=>'purchase','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="row">
			<div class="col-md-6">
				<label for="name">PO</label>
				<input type="text" name="po" class="form-control" placeholder="PO...">
			</div>
			
			</div>
			<div class="row">
				<div class="col-md-5">
					
						<label>Supplier </label>
						<select name="suplier_id" class="form-control">
							@foreach ($supplier as $s)
								<option value="{{$s->id}}">{{$s->name}} </option>
							@endforeach
						</select>
				
				</div>
			</div>
			<div class="form-group">
					<label for="delivery_date">Delivery Date</label>
					<input type="date" name="delivery_date" class="form-control" >
				</div>
			<div class="row">
			<div class="col-md-6">
				<label for="coments">Comments</label>
				<textarea name="coments" class="form-control" placeholder="Comments"></textarea>
			</div>
			
			</div>

			<div class="panel panel-primary">
			<div class="panel-body">
			
				<div class="col-lg-4 col-xs-4 col-xs-4 col-xs-4">
					<div class="form-group">
						<label>Fabrics</label>
						<select name="pfabric_color_id" class="form-control selectpicker" id="pfabric_color_id" data-live-search="true">
						@foreach($fabric_color as $fc)
							<option value="{{$fc->id}}_{{$fc->code}}_{{$fc->color}}_{{$fc->name}}_{{$fc->price}}">{{$fc->code}}-{{$fc->color}}</option>
						@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="psupplier">Supplier</label>
						<input type="text" name="psupplier" id="psupplier" class="form-control" placeholder="Supplier" disabled="disabled">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="pprice">Price</label>
						<input type="text" name="pprice" id="pprice" class="form-control" placeholder="Price" disabled="disabled">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="pquantity_order">Quantity</label>
						<input type="number" name="pquantity" id="pquantity" class="form-control" placeholder="quantity">
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="pdelivery_date">Delivery Date</label>
						<input type="date" name="pdelivery_date" class="form-control" >
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<button type="button" id="bt_add_fabric" class="btn btn-primary">Agregar</button>
					</div>
				</div>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="purchase_detail" class="table table-striped table-bordered table-condesed table-hover">
						<thead style="background-color:#A9D0F5">
							<th>Delete</th>
							<th>Fabric</th>
							<th>Color</th>
							<th>Supplier</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Sub</th>
						</thead>
						<tfoot>
							<th>Total</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th><h4 id="total">0</h4></th>
						</tfoot>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>

			<br/>

			<br/>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Store</button>
				<button class="btn btn-danger" type="reset">Cancel</button>
			</div>
			{!!Form::close()!!}

	</div>
	@push('scripts')
	<script>
		$(document).ready(function(){
			$('#bt_add_fabric').click(function(){
				add_fabric();
			});
		});
		var cont_fabric=0;
		total_fabric=0;
		subtotal_fabric=[];
		$('#pfabric_color_id').ready(show_detial);
		$('#pfabric_color_id').change(show_detial);
		function show_detial(){
			fabric_data=document.getElementById('pfabric_color_id').value.split('_');
			$("#psupplier").val(fabric_data[3]);
			$("#pprice").val(fabric_data[4]);
		}
		function add_fabric(){
			fabric_data=document.getElementById('pfabric_color_id').value.split('_');
			fabtic=$("#pfabric_color_id option:selected").text();
			fabric_color_id=fabric_data[0];
			code=fabric_data[1];
			color=fabric_data[2];
			name=fabric_data[3];
			price=fabric_data[4];
			quantity=$("#pquantity").val();
			delivery_date=$("#pdelivery_date").val();
			if (quantity!="") {
				//subtotal_taller[cont_taller]=(cant_taller*prec_taller);
				//subtotal_taller[cont_taller]=subtotal_taller[cont_taller]-(subtotal_taller[cont_taller]*(desc_taller/100));
				//total_taller=total_taller+subtotal_taller[cont_taller];
				fila_purchase='<tr class="selected" id="fila_purchase'+cont_fabric+'"><td><button type="button" class="btn btn-warning" onclick="remove('+cont_fabric+');">X</button></td><td><input type="hidden" name="fabric_color_id[]" value="'+fabric_color_id+'">'+code+'</td><td>'+color+'</td><td>'+name+'</td><td>'+price+'</td><td><input type="number" name="quantity_order[]" value="'+quantity+'"></td><td></td></tr>';
				cont_fabric++;
				clear();
				//AGREGAR NO FUNCIONO DATE </td><td><input type="date" name="delivered_date[]" value="'+delivery_date+'"></td>
				//$("#total_taller").html("S/. " +total_taller);
				//$("#tExi").html(total_taller);
				//evaluar();
				$("#purchase_detail").append(fila_purchase);
			}
			else{
				alert('La cantidad de personas debe de ser mayor a 0');
			}
		}
		function remove(index){
			//total_taller = total_taller - subtotal_taller[index];
			//$("#total_taller").html("S/. " +total_taller);
			$("#fila_purchase" + index).remove();
			//evaluar();
		}
		function clear(){
			$("#pcant_taller").val("");
			$("#pdesc_taller").val("");
		}
		</script>
	@endpush
@endsection