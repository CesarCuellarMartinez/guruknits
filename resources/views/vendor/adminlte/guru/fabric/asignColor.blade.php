@extends('adminlte::layouts.app')
@section('encabezado')
	Add Color to: {{$fabric->code}}
@endsection
@section('main-content')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			@if(count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<!--El url es de las rutas
			el route es el nombre del enrutamiento + . + metodo a llamar
			-->

		
		{!!Form::open(array('url'=>'/asignColor/{{$fabric->id}}','method'=>'POST','autocomplete'=>'off'))!!}
			
			{{Form::token()}}
			<div class="row">
				<div class="col-md-3">
			
				<label>Color</label>
				<select name="color_id" class="form-control">

					<?php 
					

						foreach ($colors as $c ) {
						$cont =0;
							foreach ($faco as $f ) {
								if($c->id == $f->color_id)
								{
									$cont++;
								}
							}
							if($cont == 0)
							{	
								echo"<option value=".$c->id." >".$c->name."</option>";}
							}
						
					?>

				</select>
				<input type="hidden" name="f" value="{{$fabric->id}}">
			
		</div>

		
	</div>
		
			
				<br>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">Save</button>
					<button class="btn btn-danger" type="reset">Cancel</button>
				</div>
			
			{!!Form::close()!!}

					<div class="row">
						<div class="=col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-condensed table-hover">
									<thead>
										<th>Id</th>
										<th>Color</th>
										
										<th>Options</th>
									</thead>
									@foreach($faco as $fc)
									<tr>
										<td>{{$fc->id}}</td>
										<td>{{$fc->color}}</td>
								
		
								<td>
									
								<a href="" data-target="#modalColor-delete-{{$fc->id}}" data-toggle="modal"><button class="btn btn-danger">Delete</button></a></td>
									@push('scripts')
								<script>
								$('#modalColor-delete-{{$fc->id}}').appendTo("body");
									$("#modalColor-delete-{{$fc->id}}").css("z-index", "1500");
									//$('#modal-delete-1').appendTo("body");
								</script>
								@endpush
							 </tr> 
							@include('adminlte::guru.fabric.modalColor')
							@endforeach 
						</table>
					</div>
					
				</div>
			</div>
			</div>
		</div>
	
@endsection