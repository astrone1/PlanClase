<?php

class AlumnosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$alumnos= Alumnos::orderBy('id','DESC')->get();
		 return View::make('alumnos.index')->with('alumnos',$alumnos);
	}

	

	 public function getCreate()
	{
		return View::make('alumnos.create');
	}


	
	public function store()
	{
		$alumno = new Alumnos;

		$alumno->rut = Input::get('Rut');
		$alumno->nombres = ucwords(Input::get('Nombres'));
		$alumno->apellidos = ucwords(Input::get('Apellidos'));
		$alumno->fecha_nacimiento = Input::get('fecha');
		$alumno->genero = Input::get('Genero');
		$alumno->direccion = ucwords(Input::get('Direccion'));
		$alumno->telefono = Input::get('Telefono');
		$alumno->email = Input::get('Email');
		$alumno->estado = ucwords(Input::get('Estado'));
		$alumno->carrera_fk = Input::get('carrera');

		if ($alumno->save())
		{
			Session::flash('message','Alumno agregado correctamente!');
			Session::flash('class','succes');
		}
		else
		{
			Session::flash('message','Error');
			Session::flash('class','danger');
		}
		return Redirect::to('alumnos/create');
		
	}


	public function getShow($id)
	{
		$alumno = Alumnos::find($id);
		$carrera = Carreras::find($alumno->carrera_fk);
		return View::make('alumnos.show')->with('alumnos',$alumno)->with('carrera',$carrera);
	}


	public function getEdit($id = null)
	{
		$alumno= Alumnos::find($id);


		return View::make('alumnos.edit')->with('alumnos',$alumno);
		
	}


	public function update($id)
	{
		$ealumno= Alumnos::find($id);

		$alumno->rut = Input::get('Rut');
		$alumno->nombres = Input::get('Nombres');
		$alumno->apellidos = Input::get('Apellidos');
		$alumno->fecha_nacimiento = Input::get('Fecha');
		$alumno->genero = Input::get('Genero');
		$alumno->direccion = Input::get('Direccion');
		$alumno->telefono = Input::get('Telefono');
		$alumno->email = Input::get('Email');
		$alumno->estado = Input::get('Estado');
		$alumno->carrera_fk = Input::get('carrera');

		if ($alumno->save())
		{
			Session::flash('message','Se genero correctamente!');
			Session::flash('class','succes');
		}
		else
		{
			Session::flash('message','No se genero');
			Session::flash('class','danger');
		}

		return Redirect::to('alumnos/edit/'.$id);
	}


	public function destroy($id)
	{
		$alumno= Alumnos::find($id);
		if($alumno->delete())
		{
			Session::flash('message','Alumno eliminado!');
			Session::flash('class','succes');
		}
		else
		{
			Session::flash('mensage','Error');
			Session::flash('class','danger');
		}
		return Redirect::to('alumnos');
	}
}