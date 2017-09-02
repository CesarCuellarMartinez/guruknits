@extends('adminlte::layouts.app')
@section('encabezado')
	@if (Auth::user()->tipo == 1)
	Purchase <a href="purchase/create"><button class="btn btn-success">New...</button></a>
	@endif
@endsection
{{ Session::get('message') }}
@section('main-content')
@if (Auth::user()->tipo == 1)
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			@include('adminlte::guru.purchase.search')
		</div>	
	</div>
	<div class="row">
		<div class="=col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						<th>PO</th>
						<th>Supplier</th>
						<th>Purchase Date</th>
						<th>Delivery Date</th>
						<th>Options</th>
					</thead>
					@foreach($purchase as $p)
					<tr>
						<td>{{$purchase->id}}</td>
						<td>{{$purchase->po}}</td>
						<td>{{$purchase->name}}</td>
						<td>{{$purchase->purchase_date}}</td>
						<td>{{$purchase->delivery_date}}</td>
						<td><a href="{{URL::action('PurchaseController@edit',$p->id)}}"><button class="btn btn-info">Edit</button></a>
						<a href="" data-target="#modal-delete-{{$p->id}}" data-toggle="modal"><button class="btn btn-danger">Delete</button></a></td>
							@push('scripts')
						<script>
						$('#modal-delete-{{$col->id}}').appendTo("body");
							$("#modal-delete-{{$col->id}}").css("z-index", "1500");
							//$('#modal-delete-1').appendTo("body");
						</script>
						@endpush
					</tr>
					@include('adminlte::guru.purchase.modal')
					@endforeach
				</table>
			</div>
			{{$purchase->render()}}
		</div>
	</div>
	@endif
@endsection