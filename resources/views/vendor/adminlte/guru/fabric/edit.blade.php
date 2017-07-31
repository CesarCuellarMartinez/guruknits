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
			<div class="row">
				<div class="col-md-3">
			
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
	</div>
			<div class="row">
				<div class="col-lg-5">
					<label for="weight">Weight</label>
					<input type="text" name="weight" class="form-control" value="{{$weq}}" placeholder="Weight ...">
					
				</div>

				<div class="col-md-3">
					<label for="we_un">Units</label>
					<select name="we_un" class="form-control">

						<?php 
						$i=0;
						for($i ; $i<sizeof($wea); $i++)
						{

							if($wea[$i] == $weu)
							{
							echo"<option value=".$wea[$i]." selected>".$wea[$i]."</option>";	
							}
							
							else{
							echo"<option value=".$wea[$i]." >".$wea[$i]."</option>";}
							
						}

						?>
						
				</select>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5">
					<label for="width">Width</label>
					<input type="text" name="width" class="form-control" value="{{$wiq}}" placeholder="Weight ...">
					
				</div>

				<div class="col-md-3">
					<label for="wi_un">Units</label>
					<select name="wi_un" class="form-control">
						<?php 
						$i=0;
						for($i ; $i<sizeof($wia); $i++)
						{

							if($wia[$i] == $wiu)
							{
							echo"<option value=".$wia[$i]." selected>".$wia[$i]."</option>";	
							}
							
							else{
							echo"<option value=".$wia[$i]." >".$wia[$i]."</option>";}
							
						}

						?>
				</select>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<label for="coo">Country of Origen</label>
					<input type="text" name="coo" class="form-control" value="{{$fabric->coo}}" placeholder="Coo ...">
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5">
					<label for="price">Price</label>
					<input type="number" step="0.1" name="price" class="form-control" value="{{$pr}}" placeholder="Price ...">
					
				</div>
				<div class="col-md-3">
					<label for="pr_un">Units</label>
					<select name="pr_un" class="form-control">
						<?php 
						$i=0;
						for($i ; $i<sizeof($pua); $i++)
						{

							if($pua[$i] == $un)
							{
							echo"<option value=".$pua[$i]." selected>".$pua[$i]."</option>";	
							}
							
							else{
							echo"<option value=".$pua[$i]." >".$pua[$i]."</option>";}
							
						}

						?>
				</select>
				</div>
				<div class="col-md-3">
					<label for="pr_c">Currency</label>
					<select name="pr_c" class="form-control">
						<?php 
						$i=0;
						for($i ; $i<sizeof($pca); $i++)
						{

							if($pca[$i] == $cu)
							{
							echo"<option value=".$pca[$i]." selected>".$pca[$i]."</option>";	
							}
							
							else{
							echo"<option value=".$pca[$i]." >".$pca[$i]."</option>";}
							
						}

						?>
				</select>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-8">
					<label for="description">Description</label>
					<textarea class="form-control" rows="3" name="description"  placeholder="Description..." value="{{$fabric->description}}">{{$fabric->description}}</textarea>
					
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