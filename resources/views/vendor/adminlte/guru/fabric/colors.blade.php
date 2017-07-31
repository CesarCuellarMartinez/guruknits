@extends('adminlte::layouts.app')
@section('encabezado')
	Asign Colors to: {{$fabric->code}}
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

			{!!Form::model($fabric,['method'=>'PATCH','route'=>['fabric.edit',$fabric->id]])!!}
			{{Form::token()}}
		
			
				<label>Colors</label>
				<select name="color_id" class="form-control">
					@foreach ($faco as $c)
						@if($c->id =! $c->id)
						<option value="{{$c->id}}"selected>{{$c->name}} </option>
						
						@endif
					@endforeach
				</select>
		
		</div>

		
				
				<br>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">Save</button>
					<button class="btn btn-danger" type="reset">Cancel</button>
				</div>
			</div>
			{!!Form::close()!!}
		</div>

		<div class="row">
		<div class="=col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						
						<th>Color</th>
						<th>Options</th>
					</thead>
					@foreach($faco as $f)
					<tr>
						<td>{{$f->color}}</td>

						<td>
						<a href="" data-target="#modal-delete2-{{$f->id}}" data-toggle="modal"><button class="btn btn-danger">Delete</button></a></td>
							@push('scripts')
						<script>
						$('#modal-delete2-{{$f->id}}').appendTo("body");
							$("#modal-delete2-{{$f->id}}").css("z-index", "1500");
							//$('#modal-delete-1').appendTo("body");
						</script>
						@endpush
					</tr>
					@include('adminlte::guru.fabric.modal2')
					@endforeach
				</table>
			</div>
			{{$fabric->render()}}
		</div>
	</div>
	
@endsection