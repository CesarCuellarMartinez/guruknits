@extends('adminlte::layouts.app')
@section('encabezado')
	New Supplier
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
			{!!Form::open(array('url'=>'supplier','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="row">
			<div class="col-md-6">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" placeholder="Name ...">
			</div>
			
			</div>
			<div class="row">
				<div class="col-lg-8">
					<label for="address">Address</label>
					<input type="text" name="address" class="form-control" placeholder="Address ...">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<label for="contact">Contact</label>
					<input type="text" name="contact" class="form-control" placeholder="Contact ...">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<label for="Telephone">telephone</label>
					<input type="text" name="telephone" class="form-control" placeholder="Telephone ...">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<label for="country">Country</label>
					<input type="text" name="country" class="form-control" placeholder="Country ...">
					
				</div>
			</div>
			<div class="col-md-3">
			
				<label>Supplier Tipe</label>
				<select name="supplier_tipe_id" class="form-control">
					@foreach ($suppliertipe as $supt)
						<option value="{{$supt->id}}">{{$supt->tipe}} </option>
					@endforeach
				</select>
		
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