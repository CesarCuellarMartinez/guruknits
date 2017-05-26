@extends('adminlte::layouts.app')
@section('encabezado')
	New Content
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
			{!!Form::open(array('url'=>'content','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="row">
			<div class="col-md-6">
				<label for="description">Description</label>
				<input type="text" name="description" class="form-control" placeholder="Content description...">
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
	</div>
@endsection