@extends('layouts.admin')

@section('estilos')
<link href="{{ url('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@stop

@section('content')

<div class="col-md-6 col-md-offset-3">
	
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-7">
					<h3 class="panel-title">Nuevo paciente</h3>	
				</div>
			
			</div>
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
				
			{{ Form::open(['url' => 'guardapaciente','role' => 'form','class' => 'form-horizontal']) }}				
				<div class="row">
					<div class="form-group col-md-10 col-md-offset-1">
						{{ Form::label('nom','Nombre completo',['class' => 'col-sm-4 control-label']) }}
						<div class="col-sm-8">
							{{ Form::text('nom',null,['class' => 'form-control','required'=>'required']) }}							 
						</div>
					</div>
				</div>				
				<div class="row">
					<div class="form-group col-md-10 col-md-offset-1">
						{{ Form::label('email','Correo electrónico',['class' => 'col-sm-4 control-label']) }}
						<div class="col-sm-8">
							{{ Form::email('email',null,['class' => 'form-control','required'=>'required']) }}
						</div>
					</div>
				</div>				
				<div class="row">
					<div class="form-group col-md-10 col-md-offset-1">
						{{ Form::label('fena','Fecha de nacimiento',['class' => 'col-sm-4 control-label']) }}
						<div id="sandbox-container" class="col-sm-8">
							<div class="input-group date input">
								{{ Form::text('fena',null,['class' => 'form-control','required'=>'required']) }}
								<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
							</div>
						</div>
					</div>
				</div>		
				<div class="row">
					<div class="form-group col-md-10 col-md-offset-1">
						{{ Form::label('ts','Tipo de sangre',['class' => 'col-sm-4 control-label']) }}
						<div class="col-sm-8">
							{{ Form::select('ts',['1'=>'A+','2'=>'A-','3'=>'B+','4'=>'B-','5'=>'AB+','6'=>'AB-','7'=>'O+','8'=>'O-'],null,['class' => 'form-control','required'=>'required']) }}							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-10 col-md-offset-1">
						{{ Form::label('con_esp','Consideraciones especiales',['class' => 'col-sm-4 control-label']) }}
						<div class="col-sm-8">
							{{ Form::textarea('con_esp',null,['class' => 'form-control','rows'=>'5']) }}							
						</div>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-10 col-md-offset-1">
						<div class="col-sm-8 col-sm-offset-4">
							<button type="submit" class="btn btn-primary ">Guardar <i class="fa fa-save fa-fw"></i></button>
							<button type="button" class="btn btn-danger" onclick="location.href='{{ url('/pacientes') }}'">Cancelar <i class="fa fa-times fa-fw"></i></button>
						</div>
					</div>
				</div>

			{{ Form::close() }}
			{{-- </form> --}}


		</div>
	</div>
</div>

@stop

@section('scripts')


<script src="{{ url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script>
	$(document).ready(function(){
	    $('#sandbox-container .input').datepicker({
	        format: "yyyy-mm-dd",
	        language: "es",
	        autoclose: true
	    });
	});
</script>
@stop