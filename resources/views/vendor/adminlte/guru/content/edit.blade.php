@extends('adminlte::layouts.app')
@section('encabezado')
	Edit: {{$content->decription}}
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

			{!!Form::model($content,['method'=>'PATCH','route'=>['content.update',$content->id]])!!}
			{{Form::token()}}
			<div class="row">
			<div class="col-md-6">
					<label for="description">Content Description</label>
					<input type="text" name="description" class="form-control" value="{{$content->description}}" placeholder="Content Description...">
				</div>
				
				</div>
				
				
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Store</button>
					<button class="btn btn-danger" type="reset">Cancel</button>
				</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection