@extends('adminlte::layouts.app')
@section('encabezado')
	@if (Auth::user()->tipo == 1)
	Content's List <a href="content/create"><button class="btn btn-success">New...</button></a>
	@endif
@endsection
{{ Session::get('message') }}
@section('main-content')
@if (Auth::user()->tipo == 1)
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@include('adminlte::guru.content.search')
		</div>	
	</div>
	<div class="row">
		<div class="=col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>Description</th>
						<th>Opciones</th>
					</thead>
					@foreach($content as $con)
					<tr>
						<td>{{$con->id}}</td>
						<td>{{$con->description}}</td>

						<td><a href="{{URL::action('ContentController@edit',$con->id)}}"><button class="btn btn-info">Edit</button></a>
						<a href="" data-target="#modal-delete-{{$con->id}}" data-toggle="modal"><button class="btn btn-danger">Delete</button></a></td>
							@push('scripts')
						<script>
						$('#modal-delete-{{$con->id}}').appendTo("body");
							$("#modal-delete-{{$con->id}}").css("z-index", "1500");
							//$('#modal-delete-1').appendTo("body");
						</script>
						@endpush
					</tr>
					@include('adminlte::guru.content.modal')
					@endforeach
				</table>
			</div>
			{{$content->render()}}
		</div>
	</div>
	@endif
@endsection