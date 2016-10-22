@extends('layouts.admin')

@section('estilos')
	<link href="{{ url('assets/vendor/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet">	
@stop

@section('content')
	

	@if(Auth::user()->priv > 1)
		<div class="alert alert-danger col-md-4 col-md-offset-4">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>No está autorizado para acceder a esta sección</strong>
		</div>	
	@else
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-10"><h3 class="panel-title" >Lista de usuarios</h3></div>					
					<div class="col-md-2">
						<a href="{{ url('usuarionuevo') }}">Nuevo usuario <i class="fa fa-plus"></i></a>
					</div>
        		</div>

			</div>
			<div class="panel-body">
				<table class="table table-striped table-hover table-condensed" id="listausuarios">
					<thead>
						<tr>
							<th>id</th><th>Nombre</th><th>Login</th><th>Correo</th><th>Priv</th><th>No. Paciente</th><th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					@foreach($usuarios as $usuario)
						<tr>
							<td>{{ $usuario->id }}</td><td>{{ $usuario->nom }}</td><td>{{ $usuario->name }}</td><td>{{ $usuario->email }}</td><td>{{ $usuario->priv }}</td>						
								@if($usuario->paciente != null && $usuario->priv >= 4)
									<td class="bg-info text-center">
									{{ str_pad($usuario->paciente->id,5,'0',STR_PAD_LEFT) }}
								@elseif($usuario->priv >= 4)
									<td class="bg-warning text-center">
									No es paciente
								@else
									<td>
									&nbsp;
								@endif
							</td>
							<td>
								@if($usuario->priv > Auth::user()->priv)
									<button type="button" class="btn btn-primary btn-xs" type="button" onclick="location.href='usuarioedita/{{ $usuario->id }}'"><i class="fa fa-pencil-square-o"></i></button>
									<button type="button" class="btn btn-danger btn-xs" type="button" onclick="location.href='usuarioelimina/{{ $usuario->id }}'"><i class="fa fa-trash-o"></i></button>
								@else
									&nbsp;
								@endif								
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>	
			</div>
		</div>	
	</div>
	@endif
@stop	

@section('scripts')
	
	<script src="{{ url('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ url('assets/vendor/datatables.net/js/dataTables.bootstrap.min.js') }}"></script>	
	
	<script>
		$(document).ready(function() {

    		$('#listausuarios').DataTable({
				  "columnDefs": [
				    { "orderable": false, "targets": 6 },				    
				  ],
				  "order" : [[1,"asc"]],
		        "language": {
		            "lengthMenu": "Mostrar _MENU_ registros por página",
		            "zeroRecords": "Ningún registro encontrado",
		            "info": "Página _PAGE_ de _PAGES_",
		            "infoEmpty": "No hay datos",
		            "infoFiltered": "(filtrar de un total de _MAX_ registros)",
		            "search":"Buscar:",
		            "paginate": {
				        "first":      "Primera",
				        "last":       "Última",
				        "next":       "Siguiente",
				        "previous":   "Anterior"
				    }
		        }				  
			});
		} );
	</script>




	
@stop
