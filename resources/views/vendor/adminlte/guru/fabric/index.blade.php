@extends('adminlte::layouts.app')
@section('encabezado')
	@if (Auth::user()->tipo == 1)
	Fabric's List <a href="fabric/create"><button class="btn btn-success">New...</button></a>
	@endif
@endsection
{{ Session::get('message') }}
@section('main-content')
@if (Auth::user()->tipo == 1)
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@include('adminlte::guru.fabric.search')
		</div>	
	</div>
	<div class="row">
		<div class="=col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Code</th>
						<th>Supplier</th>
						<th>Content</th>
						<th>Weight</th>
						<th>Width</th>
						<th>COO</th>
						<th>Price</th>
						<th>Options</th>
					</thead>
					@foreach($fabric as $fab)
					<tr>
						<td>{{$fab->id}}</td>
						<td>{{$fab->code}}</td>
						<td>{{$fab->supplier}}</td>
						<td>{{$fab->content}}</td>
						<td>{{$fab->weight}}</td>
						<td>{{$fab->width}}</td>
						<td>{{$fab->coo}}</td>
						<td>{{$fab->price}}</td>

						<td><a href="{{URL::action('FabricController@edit',$fab->id)}}"><button class="btn btn-info">Edit</button></a>
						<a href="" data-target="#modal-delete-{{$fab->id}}" data-toggle="modal"><button class="btn btn-danger">Delete</button></a></td>
							@push('scripts')
						<script>
						$('#modal-delete-{{$fab->id}}').appendTo("body");
							$("#modal-delete-{{$fab->id}}").css("z-index", "1500");
							//$('#modal-delete-1').appendTo("body");
						</script>
						@endpush
					</tr>
					@include('adminlte::guru.fabric.modal')
					@endforeach
				</table>
			</div>
			{{$fabric->render()}}
		</div>
	</div>
	@endif
@endsection