@extends('layouts.main')
@section('contenido')
	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Nuevo Alumno</h4>
  		</div>

  		<div class="panel-body">
  			<form method="post" action="store">
				<p>	    

					<input type="text" name="Rut" id="docente_fk" placeholder="Rut" class="form-control" required>
				</p>
				<p>         
              {{Form::select('escuela',Escuelas::lists('nombre','id'))}}
                </p>
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