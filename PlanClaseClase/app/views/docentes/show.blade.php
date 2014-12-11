@extends('layouts.main')
@section('contenido')
 <p>
      <table>
      <td width=505>
      <h2>Informacion Docente</h2>
      </td>
      <td>
        <a href="/docentes/edit/{{ $docentes->id }} "class="btn btn-warning btn-sm">Editar</a>
      </td>
    </table>
    </p>
    <table class="table table-striped table-hover ">
    <tbody>
          @if (!empty($docentes))
          <tr height= 10>
          <td width=100>
            <h5><b>Rut:</b></h5>         
          </td>
          <td>
            {{$docentes->rut}}
          </td>
          <tr>
            <td width=100>
              <h5><b>Nombres:</b></h5>
           </td>
          <td>
            {{$docentes->nombres}}
          </td>            
          </tr>
          <tr>
            <td width=100>
              <h5><b>Apellidos:</b></h5>
           </td>
          <td>
            {{$docentes->apellidos}}
          </td>            
          </tr>
          <tr>
            <td width=100>
              <h5><b>Fecha de Nacimiento:</b></h5>
           </td>
          <td>
            {{$docentes->fecha_nacimiento}}
          </td>            
          </tr>
          <tr>
            <td width=100>
              <h5><b>Genero:</b></h5>
           </td>
          <td>
            <?php if($docentes->genero==1)
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
              <h5><b>Direccion:</b></h5>
           </td>
          <td>
            {{$docentes->direccion}}
          </td>            
          </tr>
          <tr>
            <td width=100>
              <h5><b>Teléfono:</b></h5>
           </td>
          <td>
            {{$docentes->telefono}}
          </td>            
          </tr>
          <tr>
            <td width=100>
              <h5><b>Correo Electronico:</b></h5>
           </td>
          <td>
            {{$docentes->email}}
          </td>            
          </tr>
          <tr>
            <td width=100>
              <h5><b>Departamento:</b></h5>
           </td>
          <td>
            {{$departamento->nombre}}
          </td>            
          </tr>
        @else
        <p>
          No existe información de esta facultad.
        </p>
        @endif
      </tbody>
    </table>
        <a href="/docentes" class="btn btn-default">Volver</a>
        @stop

