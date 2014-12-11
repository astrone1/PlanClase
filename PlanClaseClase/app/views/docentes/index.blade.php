@extends('layouts.main')
@section('contenido')
    <p>
      <table>
      <td width=505>
      <h2>Docentes</h2>
      </td>
      <td>
        <a href="/docentes/create" class="btn btn-warning btn-sm">Agregar Docente</a>
      </td>
    </table>
    </p>
  <table class="table table-striped table-hover ">
  <tbody>
    @foreach($docentes as $docente)
      <tr>
      <td.width=500>{{ $docente->nombres }} {{$docente->apellidos}}</td>         
      <td>
          <a href="/docentes/show/{{ $docente->id }}"><span class="label label-info">Ver</span></a>
          <a href="/docentes/edit/{{ $docente->id }}"><span class="label label-success">Editar</span></a>
          <a href="{{url('/docentes/destroy',$docente->id)}}"><span class="label label-danger">Eliminar</span></a>
      </td>
      </tr>
    @endforeach
  </tbody>
</table>
      @if(Session::has('message'))
        <div class="btn btn-info disabled{{ Session::get('class') }}">{{ Session::get('message')}}</div>
      @endif
 @stop
</body>
</html>
