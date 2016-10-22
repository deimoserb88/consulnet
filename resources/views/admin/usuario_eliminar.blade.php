@extends('layouts.app')

@section('content')


<div class="col-md-6 col-md-offset-3">
	
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class="panel-title">Eliminar usuario <strong>{{ $usuario->name }}</strong></h3>
		</div>
		<div class="panel-body">
				
			{{ Form::open(['url' => 'eliminarusuario','role' => 'form','class' => 'form-horizontal']) }}
				{{ Form::hidden('id',$usuario->id) }}
				<div class="row">
					<div class="alert alert-danger col-md-10 col-md-offset-1">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						¿Está seguro de eliminar definitivamente el siguiente registro?
					</div>
					<div class="form-group col-md-10 col-md-offset-1">
						{{ Form::label('name','Nombre de usuario',['class' => 'col-sm-4 control-label']) }}
						<div class="col-sm-8">
							{{ Form::text('name',$usuario->name,['class' => 'form-control','disabled'=>'disabled']) }}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-10 col-md-offset-1">
						{{ Form::label('nom','Nombre completo',['class' => 'col-sm-4 control-label']) }}
						<div class="col-sm-8">
							{{ Form::text('nom',$usuario->nom,['class' => 'form-control','disabled'=>'disabled']) }}
						</div>
					</div>
				</div>				
				<div class="row">
					<div class="form-group col-md-10 col-md-offset-1">
						{{ Form::label('email','Correo electrónico',['class' => 'col-sm-4 control-label']) }}
						<div class="col-sm-8">
							{{ Form::email('email',$usuario->email,['class' => 'form-control','disabled'=>'disabled']) }}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-10 col-md-offset-1">
						{{ Form::label('priv','Tipo de usuario',['class' => 'col-sm-4 control-label']) }}
						<div class="col-sm-8">
							{{ Form::select('priv',['0'=>'Root','1'=>'Admin','2'=>'Medico','3'=>'Asistente','4'=>'Paciente','5'=>'Visita'],$usuario->priv,['class' => 'form-control','disabled'=>'disabled']) }}
						</div>
					</div>
				</div>				<div class="row">
					<div class="form-group col-md-10 col-md-offset-1">
						<div class="col-sm-8 col-sm-offset-4">
							<button type="submit" class="btn btn-warning">Eliminar <i class="fa fa-btn fa-trash-o"></i></button>
							<button type="button" class="btn btn-danger" onclick="location.href='{{ url('/usuarios') }}'">Cancelar <i class="fa fa-btn fa-times"></i></button>
						</div>
					</div>
				</div>
			{{ Form::close() }}
			{{-- </form> --}}


		</div>
	</div>

</div>

@stop