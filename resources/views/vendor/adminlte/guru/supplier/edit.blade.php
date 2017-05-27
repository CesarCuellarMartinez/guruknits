@extends('adminlte::layouts.app')
@section('encabezado')
	Edit Record: {{$supplier->name}}
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

			{!!Form::model($supplier,['method'=>'PATCH','route'=>['supplier.update',$supplier->id]])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-md-6">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control" value="{{$supplier->name}}" placeholder="Name...">
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-6">
					<label for="contact">Contact</label>
					<input type="text" name="contact" class="form-control" value="{{$supplier->contact}}" placeholder="Contact...">
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-6">
					<label for="address">Address</label>
					<input type="text" name="address" class="form-control" value="{{$supplier->address}}" placeholder="Address...">
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-6">
					<label for="telephone">Telephone</label>
					<input type="text" name="telephone" class="form-control" value="{{$supplier->telephone}}" placeholder="Telephone...">
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-6">
					<label for="country">Country</label>
					<input type="text" name="country" class="form-control" value="{{$supplier->country}}" placeholder="Country...">
				</div>
				
			</div>

			<div class="col-md-5">
			
				<label>Tipe</label>
				<select name="supplier_tipe_id" class="form-control">
					@foreach ($supplier_tipe_id as $st)
						@if($st->id==$supplier->supplier_tipe_id)
						<option value="{{$st->id}}"selected>{{$st->tipe}} </option>
						@else
						<option value="{{$st->id}}">{{$st->tipe}} </option>
						@endif
					@endforeach
				</select>
		
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