@extends('layouts.main')
@section('contenido')
 <p>
      <table>
      <td width=505>
      <h2>Informacion Docente</h2>
      </td>
      <td>
        <a href="/jefecarreras/edit/{{ $jefecarreras->id }} "class="btn btn-warning btn-sm">Editar</a>
      </td>
    </table>
    </p>
    <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($jefecarreras))
          <tr height= 10>
          <td width=100>
            <h5><b>Rut:</b></h5>         
          </td>
          <td>
            {{$jefecarrera->docente_fk}}
          </td>
          <tr>
            <td width=100>
              <h5><b>code escuela:</b></h5>
           </td>
          <td>
            {{$jefecarrera->escuela_fk}}
          </td>            
                
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

