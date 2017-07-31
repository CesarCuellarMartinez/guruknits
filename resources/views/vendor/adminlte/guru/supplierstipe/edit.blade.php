@extends('adminlte::layouts.app')
@section('encabezado')
	Edit Record: {{$supplierstipe->tipe}}
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

			{!!Form::model($supplierstipe,['method'=>'PATCH','route'=>['supplierstipe.update',$supplierstipe->id]])!!}
			{{Form::token()}}
			<div class="row">
			<div class="col-md-6">
					<label for="tipe">Tipe</label>
					<input type="text" name="tipe" class="form-control" value="{{$supplierstipe->tipe}}" placeholder="Tipe...">
				</div>
				
				</div>
				
				<div class="row">
				<div class="col-lg-8">
					<label for="description">Description</label>
					<textarea class="form-control" rows="3" name="description" value="{{$supplierstipe->description}}" placeholder="Description...">{{$supplierstipe->description}}</textarea>
					
				</div>
				</div>
				<br>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">Save</button>
					<button class="btn btn-danger" type="reset">Cancel</button>
				</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection