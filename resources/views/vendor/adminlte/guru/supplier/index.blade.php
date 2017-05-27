@extends('adminlte::layouts.app')
@section('encabezado')
	@if (Auth::user()->tipo == 1)
	Supplier's List <a href="supplier/create"><button class="btn btn-success">New...</button></a>
	@endif
@endsection
{{ Session::get('message') }}
@section('main-content')
@if (Auth::user()->tipo == 1)
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@include('adminlte::guru.supplier.search')
		</div>	
	</div>
	<div class="row">
		<div class="=col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Name</th>
						<th>Address</th>
						<th>Contact</th>
						<th>Telephone</th>
						<th>Country</th>
						<th>Tipe</th>
						<th>Options</th>
					</thead>
					@foreach($supplier as $sup)
					<tr>
						<td>{{$sup->id}}</td>
						<td>{{$sup->name}}</td>
						<td>{{$sup->address}}</td>
						<td>{{$sup->contact}}</td>
						<td>{{$sup->telephone}}</td>
						<td>{{$sup->country}}</td>
						<td>{{$sup->tipe}}</td>

						<td><a href="{{URL::action('SupplierController@edit',$sup->id)}}"><button class="btn btn-info">Edit</button></a>
						<a href="" data-target="#modal-delete-{{$sup->id}}" data-toggle="modal"><button class="btn btn-danger">Delete</button></a></td>
							@push('scripts')
						<script>
						$('#modal-delete-{{$sup->id}}').appendTo("body");
							$("#modal-delete-{{$sup->id}}").css("z-index", "1500");
							//$('#modal-delete-1').appendTo("body");
						</script>
						@endpush
					</tr>
					@include('adminlte::guru.supplier.modal')
					@endforeach
				</table>
			</div>
			{{$supplier->render()}}
		</div>
	</div>
	@endif
@endsection