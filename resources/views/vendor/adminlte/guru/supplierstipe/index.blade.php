@extends('adminlte::layouts.app')
@section('encabezado')
	@if (Auth::user()->tipo == 1)
	Supplier's Tipe List <a href="supplierstipe/create"><button class="btn btn-success">New...</button></a>
	@endif
@endsection
{{ Session::get('message') }}
@section('main-content')
@if (Auth::user()->tipo == 1)
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@include('adminlte::guru.supplierstipe.search')
		</div>	
	</div>
	<div class="row">
		<div class="=col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Tipe</th>
						<th>Description</th>
						<th>Options</th>
					</thead>
					@foreach($supplierstipe as $sup)
					<tr>
						<td>{{$sup->id}}</td>
						<td>{{$sup->tipe}}</td>
						<td>{{$sup->description}}</td>

						<td><a href="{{URL::action('SuppliersTipeController@edit',$sup->id)}}"><button class="btn btn-info">Edit</button></a>
						<a href="" data-target="#modal-delete-{{$sup->id}}" data-toggle="modal"><button class="btn btn-danger">Delete</button></a></td>
							@push('scripts')
						<script>
						$('#modal-delete-{{$sup->id}}').appendTo("body");
							$("#modal-delete-{{$sup->id}}").css("z-index", "1500");
							//$('#modal-delete-1').appendTo("body");
						</script>
						@endpush
					</tr>
					@include('adminlte::guru.supplierstipe.modal')
					@endforeach
				</table>
			</div>
			{{$supplierstipe->render()}}
		</div>
	</div>
	@endif
@endsection