@extends('layouts.main')
@section('contenido')
	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Nuevo Alumno</h4>
  		</div>

  		<div class="panel-body">
  			<form method="post" action="store">
				<p>	    

					<input type="text" name="Rut" id="Rut" placeholder="Rut" class="form-control" required>
				</p>
				<p>
					<input type="text" name="Nombres" placeholder="ingrese sus nombres" class="form-control" required>
				</p>
				<p>
					<input type="text" name="Apellidos" placeholder="ingrese sus apellidos" class="form-control" required>
				</p>
				<p>
					<input type="text" name="fecha" placeholder="ingrese su fecha de nacimiento" class="form-control" required>
				</p>
				<p>			
					 Sexo: {{Form::select('Genero',array(1 => 'Masculino', 2 => 'Femenino'),Input::old('Genero'),array('class' =>'form-control'))}} 
				</p>
				<p>
					<input type="text" name="Direccion" placeholder="Direccion" class="form-control" required>
				</p>
				<p>
					<input type="text" name="Telefono" placeholder="telefono" class="form-control" required>
				</p>
				<p>
					<input type="text" name="Email" placeholder="email" class="form-control" required>
				</p>
				<p>
					<input type="text" name="Estado" placeholder="ingrese estado civil" class="form-control" required>
				</p>
				<p>
					Seleccione Carrera
				</p>				 
				 	{{Form::select('carrera',Carreras::lists('nombre','id'))}}
         		<p>
					<input type="submit" value="Guardar" class="btn btn-success">
					<a href="/alumnos" class="btn btn-default">Volver</a>
				</p>
			</form>
		</div>
	</div>

	  @if(Session::has('message'))
    <div class="btn btn-success disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
  @endif
  
  @stop
</body>
</html>