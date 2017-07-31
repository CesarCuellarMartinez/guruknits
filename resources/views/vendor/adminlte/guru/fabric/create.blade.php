@extends('adminlte::layouts.app')
@section('encabezado')
	New Fabric
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
			{!!Form::open(array('url'=>'fabric','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-md-6">
					<label for="code">Code</label>
					<input type="text" name="code" class="form-control" placeholder="Code ...">
				</div>
			</div>
			<div class="row">
					<div class="col-md-3">
					
						<label>Supplier</label>
						<select name="supplier_id" class="form-control">
							@foreach ($supplier as $sup)
								<option value="{{$sup->id}}">{{$sup->name}} </option>
							@endforeach
						</select>
				
				</div>
				<div class="col-md-5">
					
						<label>Content </label>
						<select name="content_id" class="form-control">
							@foreach ($content as $con)
								<option value="{{$con->id}}">{{$con->description}} </option>
							@endforeach
						</select>
				
				</div>
			</div>
					
			<div class="row">
				<div class="col-md-5">
					<label for="weight">Weight</label>
					<input type="text" name="weight" class="form-control" placeholder="Weight ...">
				</div>
				<div class="col-md-3">
					<label for="we_un">Units</label>
					<select name="we_un" class="form-control">
						<option value="onze/YD2" >onze/YD2</option>
						<option value="grms/M2">grms/M2</option>
				</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<label for="width">Width (cut-tot)</label>
					<input type="text" name="width" class="form-control" placeholder="Width ...">
				</div>
				<div class="col-md-3">
					<label for="wi_un">Units</label>
					<select name="wi_un" class="form-control">
						<option value="inch">inch</option>
						<option value="cm">cm</option>
				</select>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<label for="coo">Country of origen</label>
					<input type="text" name="coo" class="form-control" placeholder="Coo ...">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5">
					<label for="price">Price</label>
					<input type="number" step="0.1" name="price" class="form-control" placeholder="Price ...">
					
				</div>
				<div class="col-md-3">
					<label for="pr_un">Units</label>
					<select name="pr_un" class="form-control">
						<option value="yd">yd</option>
						<option value="lb">lb</option>
				</select>
				</div>
				<div class="col-md-3">
					<label for="pr_c">Currency</label>
					<select name="pr_c" class="form-control">
						<option value="US">US</option>
						<option value="E">E</option>
				</select>
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
		</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection