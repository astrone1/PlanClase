@extends('layouts.main')
@section('contenido')
 <p>
      <table>
      <td width=505>
      <h2>Informacion Docente</h2>
      </td>
      <td>
        <a href="/alumnos/edit/{{ $alumnos->id }} "class="btn btn-warning btn-sm">Editar</a>
      </td>
    </table>
    </p>
    <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($alumnos))
          <tr height= 10>
          <td width=100>
            <h5><b>Rut:</b></h5>         
          </td>
          <td>
            {{$alumnos->rut}}
          </td>
          <tr>
            <td width=100>
              <h5><b>Nombres:</b></h5>
           </td>
          <td>
            {{$alumnos->nombres}}
          </td>            
          </tr>
          <tr>
            <td width=100>
              <h5><b>Apellidos:</b></h5>
           </td>
          <td>
            {{$alumnos->apellidos}}
          </td>            
          </tr>
          <tr>
            <td width=100>
              <h5><b>Fecha de Nacimiento:</b></h5>
           </td>
          <td>
            {{$alumnos->fecha_nacimiento}}
          </td>            
          </tr>
          <tr>
            <td width=100>
              <h5><b>Genero:</b></h5>
           </td>
          <td>
            <?php if($alumnos->genero==1)
            {
              echo "Masculino";
            }
            else
            {
              echo "Femenino";
            }
            ?>
          </td>            
          </tr>
          <tr>
            <td width=100>
              <h5><b>Estado Civil:</b></h5>
           </td>
          <td>
            {{$alumnos->estado}}
          </td>            
          </tr>
          <tr>
            <td width=100>
              <h5><b>Direccion:</b></h5>
           </td>
          <td>
            {{$alumnos->direccion}}
          </td>            
          </tr>
          <tr>
            <td width=100>
              <h5><b>Teléfono:</b></h5>
           </td>
          <td>
            {{$alumnos->telefono}}
          </td>            
          </tr>
          <tr>
            <td width=100>
              <h5><b>Correo Electronico:</b></h5>
           </td>
          <td>
            {{$alumnos->email}}
          </td>            
          </tr>
          <tr>
            <td width=100>
              <h5><b>Carrera:</b></h5>
           </td>
          <td>
            {{$carrera->nombre}}
          </td>            
          </tr>
        @else
        <p>
          No existe información de esta facultad.
        </p>
        @endif
      </tbody>
    </table>
        <a href="/alumnos" class="btn btn-default">Volver</a>
        @stop
</body>
</html>

