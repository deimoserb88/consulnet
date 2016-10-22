@extends('layouts.admin')

@section('estilos')
	<link href="{{ url('assets/vendor/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet">
	{{-- <link href="{{ url('assets/vendor/datatables.net-dt/css/dataTables.bootstrap.min.css') }}" rel="stylesheet"> --}}
@stop

@section('content')
	

	@if(Auth::user()->priv > 3)
		<div class="alert alert-danger col-md-4 col-md-offset-4">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>No está autorizado para acceder a esta sección</strong>
		</div>	
	@else
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-9"><h3 class="panel-title" >Lista de pacientes</h3></div>					
					<div class="col-md-3">
						<a href="{{ url('pacientenuevo') }}">Nuevo paciente <i class="fa fa-plus"></i></a>
					</div>
        		</div>

			</div>
			<div class="panel-body">
				<table class="table table-striped table-hover table-condensed" id="listapacientes">
					<thead>
						<tr>
							<th>id</th><th>Usuario</th><th>Nombre</th><th>Tipo de sangre</th><th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					@foreach($pacientes as $paciente)
						<tr>
							<td>{{ $paciente->id }}</td>
							<td>{{ $paciente->usuario->name }}</td>
							<td>{{ $paciente->usuario->nom }}</td>
							<td class="text-center">{{ ConsulNet\Paciente::tiposangre($paciente->ts) }}</td>
							<td>
								<button type="button" class="btn btn-primary btn-xs" type="button" onclick="location.href='pacienteedita/{{ $paciente->id }}'"><i class="fa fa-pencil-square-o"></i></button>
								<button type="button" class="btn btn-danger btn-xs" type="button" onclick="location.href='pacienteelimina/{{ $paciente->id }}'"><i class="fa fa-trash-o"></i></button>
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
	<script src="{{ url('assets/vendor/datatables.net/js/dataTables.bootstrap.js') }}"></script>

	<script>
		$(document).ready(function() {

    		$('#listapacientes').DataTable({
				  "columnDefs": [
				    { "orderable": false, "targets": 5 },				    
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



