@extends('adminlte::layouts.app')
@section('encabezado')
	New Suppliers Tipe
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
			<!--El url es de las rutas-->
			{!!Form::open(array('url'=>'supplierstipe','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="row">
			<div class="col-md-6">
				<label for="tipe">Tipe</label>
				<input type="text" name="tipe" class="form-control" placeholder="Tipe ...">
			</div>
			
			</div>
			<div class="row">
				<div class="col-lg-8">
					<label for="description">Description</label>
					<textarea class="form-control" rows="3" name="description"  placeholder="Description..."></textarea>
					
				</div>
				</div>
			
			<br/>

			<br/>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Save</button>
				<button class="btn btn-danger" type="reset">Cancel</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection