@extends('layouts.app')

@section('content')


<div class="col-md-6 col-md-offset-3">
	
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Editar usuario <strong>{{ $usuario->name }}</strong></h3>
		</div>
		<div class="panel-body">

			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
				
			{{ Form::open(['url' => 'guardausuario','role' => 'form','class' => 'form-horizontal']) }}
				{{ Form::hidden('id',$usuario->id) }}
				<div class="row">
					<div class="form-group col-md-10 col-md-offset-1">
						{{ Form::label('name','Nombre de usuario',['class' => 'col-sm-4 control-label']) }}
						<div class="col-sm-8">
							{{ Form::text('name',$usuario->name,['class' => 'form-control','required'=>'required']) }}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-10 col-md-offset-1">
						{{ Form::label('nom','Nombre completo',['class' => 'col-sm-4 control-label']) }}
						<div class="col-sm-8">
							{{ Form::text('nom',$usuario->nom,['class' => 'form-control','required'=>'required']) }}
						</div>
					</div>
				</div>				
				<div class="row">
					<div class="form-group col-md-10 col-md-offset-1">
						{{ Form::label('email','Correo electrónico',['class' => 'col-sm-4 control-label']) }}
						<div class="col-sm-8">
							{{ Form::email('email',$usuario->email,['class' => 'form-control','required'=>'required']) }}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-10 col-md-offset-1">
						{{ Form::label('priv','Privilegios',['class' => 'col-sm-4 control-label']) }}
						<div class="col-sm-8">
							{{ Form::select('priv',['0'=>'Root','1'=>'Admin','2'=>'Medico','3'=>'Asistente','4'=>'Paciente','5'=>'Visita'],$usuario->priv,['class' => 'form-control','required'=>'required']) }}
						</div>
					</div>
				</div>				<div class="row">
					<div class="form-group col-md-10 col-md-offset-1">
						<div class="col-sm-8 col-sm-offset-4">
							<button type="submit" class="btn btn-primary">Guardar <i class="fa fa-btn fa-save"></i></button>
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