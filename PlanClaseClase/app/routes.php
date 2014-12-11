<?php
               //rutas login
               Route::get('/', 'LoginController@showLogin');
               Route::get('login', 'LoginController@showLogin');
               Route::post('login', 'LoginController@postLogin');
               Route::get('logout', 'LoginController@getLogout');
               Route::group(array('before' => 'auth'), function() {
               Route::get('home', 'HomeController@showWelcome');
               Route::post('home', 'HomeController@showWelcome');
               });


         
               //rutas docentes
               Route::post('/docentes/store','DocentesController@store');
               Route::post('/docentes/update/{id}','DocentesController@update');
               Route::get('/docentes/destroy/{id}','DocentesController@destroy');
               Route::controller('docentes','DocentesController');


               //rutas de alumnos
               Route::post('/alumnos/store','AlumnosController@store');
               Route::post('/alumnos/update/{id}','AlumnosController@update');
               Route::get('/alumnos/destroy/{id}','AlumnosController@destroy');
               Route::controller('alumnos','AlumnosController');

               //rutas jefecarreras
               Route::post('/jefecarreras/store','JefeCarrerasController@store');
               Route::post('/jefecarreras/update/{id}','JefeCarrerasController@update');
               Route::post('/jefecarreras/destroy/{id}','JefeCarrerasController@destroy');
               Route::post('jefecarreras','JefeCarrerasController');

               //

          