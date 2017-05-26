<div class="modal  modal-slide-in-rigth" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$con->id}}">
	{{Form::Open(array('action'=>array('ContentController@destroy',$con->id),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" arial-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Delete Record</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<a href="{{URL::action('ContentController@eli',$con->id)}}"><button class="btn btn-info">
								Confirmar</button></a>

			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>