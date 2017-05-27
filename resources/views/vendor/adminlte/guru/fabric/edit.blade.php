@extends('adminlte::layouts.app')
@section('encabezado')
	Edit Record: {{$fabric->code}}
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

			{!!Form::model($fabric,['method'=>'PATCH','route'=>['fabric.update',$fabric->id]])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-md-6">
					<label for="code">Code</label>
					<input type="text" name="code" class="form-control" value="{{$fabric->code}}" placeholder="Code ...">
				</div> 
			</div>
			<div class="col-md-5">
			
				<label>Supplier</label>
				<select name="supplier_id" class="form-control">
					@foreach ($supplier as $st)
						@if($st->id==$fabric->supplier_id)
						<option value="{{$st->id}}"selected>{{$st->name}} </option>
						@else
						<option value="{{$st->id}}">{{$st->name}} </option>
						@endif
					@endforeach
				</select>
		
		</div>

		<div class="col-md-5">
			
				<label>Content</label>
				<select name="content_id" class="form-control">
					@foreach ($content as $st)
						@if($st->id==$fabric->content_id)
						<option value="{{$st->id}}"selected>{{$st->description}} </option>
						@else
						<option value="{{$st->id}}">{{$st->description}} </option>
						@endif
					@endforeach
				</select>
		
		</div>
			
			<div class="row">
				<div class="col-lg-8">
					<label for="weight">Weight(kg)</label>
					<input type="text" name="weight" class="form-control" value="{{$fabric->weight}}" placeholder="Weight ...">
					
				</div>
			
				<div class="col-lg-8">
					<label for="width">Width(ft)</label>
					<input type="text" name="width" class="form-control" value="{{$fabric->width}}" placeholder="Width ...">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<label for="coo">Coo</label>
					<input type="text" name="coo" class="form-control" value="{{$fabric->coo}}" placeholder="Coo ...">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<label for="price">Price</label>
					<input type="number" step="0.1" name="price" class="form-control" value="{{$fabric->price}}" placeholder="Price ...">
					
				</div>
			</div>
				
				<br>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">Save</button>
					<button class="btn btn-danger" type="reset">Cancel</button>
				</div>
			</div>
			{!!Form::close()!!}
		</div>
	
@endsection