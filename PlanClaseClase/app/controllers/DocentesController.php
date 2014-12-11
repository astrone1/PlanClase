<?php
class DocentesController extends \BaseController {
/**
* Display a listing of the resource.
*
* @return Response
*/
public function getIndex()
{
$docentes= Docentes::orderBy('id','DESC')->get();
return View::make('docentes.index')->with('docentes',$docentes);
}
/**
* Show the form for creating a new resource.
*
* @return Response
*/
public function getCreate()
{
return View::make('docentes.create');
}
/**docente* Store a newly created resource in storage.
*
* @return Response
*/
public function store()
{
$docente = new Docentes;
$docente->rut = Input::get('Rut');
$docente->nombres = ucwords(Input::get('Nombres'));
$docente->apellidos = ucwords(Input::get('Apellidos'));
$docente->fecha_nacimiento = Input::get('Fecha');
$docente->genero = Input::get('Genero');
$docente->direccion = ucwords(Input::get('Direccion'));
$docente->telefono = Input::get('Telefono');
$docente->email = Input::get('Email');
$docente->departamento_fk = Input::get('departamento');
if ($docente->save())
{
Session::flash('message','Docente ha sido agregado correctamente!');
Session::flash('class','succes');
}
else
{
Session::flash('message','Ups! ha ocurrido un error');
Session::flash('class','danger');
}
return Redirect::to('docentes/create');
}
/**
* Display the specified resource.
*
* @param int $id
* @return Response
*/
public function getShow($id)
{
$docente = Docentes::find($id);
$departamento = Departamentos::find($docente->departamento_fk);
return View::make('docentes.show')->with('docentes',$docente)->with('departamento',$departamento);
}
/**
* Show the form for editing the specified resource.
*
* @param int $id
* @return Response
*/
public function getEdit($id = null)
{
$docente= Docentes::find($id);
return View::make('docentes.edit')->with('docentes',$docente);
}
/**
* Update the specified resource in storage.
*
* @param int $id
* @return Response
*/
public function update($id)
{
$docente= Docentes::find($id);
$docente->rut = Input::get('Rut');
$docente->nombres = ucwords(Input::get('Nombres'));
$docente->apellidos = ucwords(Input::get('Apellidos'));
$docente->fecha_nacimiento = Input::get('Fecha de Nacimiento');
$docente->genero = Input::get('Genero');
$docente->direccion = ucwords(Input::get('Direccion'));
$docente->telefono = Input::get('Telefono');
$docente->email = Input::get('Email');
$docente->departamento_fk = Input::get('departamento');
if ($docente->save())
{
Session::flash('message','Informacion actualizada correctamente!');
Session::flash('class','succes');
}
else
{
Session::flash('message','Ups! No se ha podido actualizar');
Session::flash('class','danger');
}
return Redirect::to('docentes/edit/'.$id);
}
/**
* Remove the specified resource from storage.
*
* @param int $id
* @return Response
*/
public function destroy($id)
{
$docente= Docentes::find($id);
if($docente->delete())
{
Session::flash('message','Docente eliminado correctamente!');
Session::flash('class','succes');
}
else
{
Session::flash('mensage','Ups! ha ocurrido un error');
Session::flash('class','danger');
}
return Redirect::to('docentes');
}
}