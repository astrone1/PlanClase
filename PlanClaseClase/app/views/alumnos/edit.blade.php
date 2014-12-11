@extends('layouts.main')
@section('contenido')
	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Editar Alumno</h4>
  		</div>

  		<div class="panel-body">
        @if (!empty($alumnos))
    			<form method="post" action="/alumnos/update/{{ $alumnos->id }}">
            <p>
            <input value="{{ $alumnos->rut }}" type="text" name="Rut" placeholder="Descripcion" class="form-control" required>
          </p>
          <p>
            <input value="{{ $alumnos->nombres }}" type="text" name="Nombres" placeholder="Nombre" class="form-control" required>
          </p>
          <p>
            <input value="{{ $alumnos->apellidos }}" type="text" name="Apellidos" placeholder="Descripcion" class="form-control" required>
          </p>
          <p>
            <input value="{{ $alumnos->fecha_nacimiento }}" type="text" name="Fecha" placeholder="Descripcion" class="form-control" required>
          </p>
          <p>
            <input value="{{ $alumnos->genero }}" type="value" name="Genero" placeholder="Descripcion" class="form-control" required>
          </p>
          <p>
            <input value="{{ $alumnos->direccion }}" type="text" name="Direccion" placeholder="Descripcion" class="form-control" required>
          </p>
            <input value="{{ $alumnos->telefono }}" type="text" name="Telefono" placeholder="Descripcion" class="form-control" required>
          </p>
            <input value="{{ $alumnos->email }}" type="text" name="Email" placeholder="Descripcion" class="form-control" required>
          </p>
            <input value="{{ $alumnos->estado }}" type="text" name="Estado" placeholder="Descripcion" class="form-control" required>
          </p>
          <p>         
              {{Form::select('carrera',Carreras::lists('nombre','id'))}}
          </p>
          <input type="submit" value="Guardar Cambios" class="btn btn-success">
          @else
          <p>
            No existe información para este Alumno.
          </p>
          @endif
        <a href="/alumnos" class="btn btn-default">Volver</a>
      </form>
		</div>
	</div>
   @stop
</body>
</html>