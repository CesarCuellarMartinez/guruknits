<div class="modal  modal-slide-in-rigth" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$hor->id}}">
	{{Form::Open(array('action'=>array('HoraController@destroy',$hor->id),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" arial-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar Registro</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar el Registro</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<a href="{{URL::action('TallerController@eli',$hor->id)}}"><button class="btn btn-info">
				
				Confirmar</button></a>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>