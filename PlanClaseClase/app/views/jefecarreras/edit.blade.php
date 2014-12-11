@extends('layouts.main')
@section('contenido')
	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Editar Jefe Carrera</h4>
  		</div>

  		<div class="panel-body">
        @if (!empty($jefecarreras))
    			<form method="post" action="/jefecarreras/update/{{ $jefecarreras->id }}">
            <p>
            <input value="{{ $jefecarreras->docente_fk}}" type="text" name="Rut" placeholder="Descripcion" class="form-control" required>
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