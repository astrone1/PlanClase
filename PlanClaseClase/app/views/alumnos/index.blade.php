@extends('layouts.main')
@section('contenido')
    <p>
      <table>
      <td width=505>
      <h2>Alumnos</h2>
      </td>
      <td>
        <a href="/alumnos/create" class="btn btn-warning btn-sm">Agregar Alumno</a>
      </td>
    </table>
    </p>
  <table class="table table-striped table-hover ">
  <tbody>
    @foreach($alumnos as $alumno)
      <tr>
      <td width=500>{{ $alumno->nombres }} {{$alumno->apellidos}}</td>         
      <td>
          <a href="/alumnos/show/{{ $alumno->id }}"><span class="label label-info">Ver</span></a>
          <a href="/alumnos/edit/{{ $alumno->id }}"><span class="label label-success">Editar</span></a>
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

