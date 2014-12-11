@extends('layouts.main')
@section('contenido')
    <p>
      <table>
      <td width=505>
      <h2>Jefes Carreras</h2>
      </td>
      <td>
        <a href="/alumnos/create" class="btn btn-warning btn-sm">Agregar Jefe Carrera</a>
      </td>
    </table>
    </p>
  <table class="table table-striped table-hover ">
  <tbody>
    @foreach($jefecarreras as $jefecarrera)
      <tr>
        <tr>
      <p>         
              {{Form::select('docente',Docentes::lists('nombre','id'))}}
      </p>   
      <p>         
              {{Form::select('docente',Docentes::lists('apellido','id'))}}
      </p>            
      <td>
          <a href="/jefecarreras/show/{{ $jefecarrera->id }}"><span class="label label-info">Ver</span></a>
          <a href="/jefecarreras/edit/{{ $jefecarrera->id }}"><span class="label label-success">Editar</span></a>
          <a href="{{url('/alumnos/destroy',$estudiante->id)}}"><span class="label label-danger">Eliminar</span></a>
      </td>
      </tr>
    @endforeach
  </tbody>
</table>
      @if(Session::has('message'))
        <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
      @endif
      <table>
    <td width= 505>
      <a href="/admin" class="btn btn-danger btn-xs">Cerrar</a>
    </td>
  </table>
  @stop

