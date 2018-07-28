<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

//Rutas para los roles
Route::group(['middleware'=>['auth']], function() {
  Route::get('roles', 'RolesController@index')          ->name('roles.index')   ->middleware('permission:indice roles');
  Route::get('roles/create', 'RolesController@create')  ->name('roles.create')  ->middleware('permission:crear roles');;
  Route::post('roles/store', 'RolesController@store')   ->name('roles.store')   ->middleware('permission:crear roles');;
  Route::get('roles/{id}', 'RolesController@show')      ->name('roles.show')    ->middleware('permission:ver roles');;
  Route::get('roles/{id}/edit', 'RolesController@edit') ->name('roles.edit')    ->middleware('permission:editar roles');;
  Route::patch('roles/{id}', 'RolesController@update')  ->name('roles.update')  ->middleware('permission:editar roles');;
  Route::delete('roles/{id}', 'RolesController@destroy')->name('roles.destroy') ->middleware('permission:eliminar roles');;
});

//Rutas para los permisos
Route::group(['middleware'=>['auth']], function() {
  Route::get('permisos', 'PermissionsController@index')          ->name('permisos.index')  /*->middleware('')*/;
  Route::get('permisos/create', 'PermissionsController@create')  ->name('permisos.create') /*->middleware('')*/;
  Route::post('permisos/store', 'PermissionsController@store')   ->name('permisos.store')  /*->middleware('')*/;
  Route::get('permisos/{id}', 'PermissionsController@show')      ->name('permisos.show')   /*->middleware('')*/;
  Route::get('permisos/{id}/edit', 'PermissionsController@edit') ->name('permisos.edit')   /*->middleware('')*/;
  Route::patch('permisos/{id}', 'PermissionsController@update')  ->name('permisos.update') /*->middleware('')*/;
  Route::delete('permisos/{id}', 'PermissionsController@destroy')->name('permisos.destroy')/*->middleware('')*/;
});

//Rutas para los usuarios
Route::group(['middleware'=>['auth']], function() {
  Route::get('users', 'UserController@index')          ->name('users.index')  /*->middleware('')*/;
  Route::get('users/create', 'UserController@create')  ->name('users.create') /*->middleware('')*/;
  Route::post('users/store', 'UserController@store')   ->name('users.store')  /*->middleware('')*/;
  Route::get('users/{id}', 'UserController@show')      ->name('users.show')   /*->middleware('')*/;
  Route::get('users/{id}/edit', 'UserController@edit') ->name('users.edit')   /*->middleware('')*/;
  Route::patch('users/{id}', 'UserController@update')  ->name('users.update') /*->middleware('')*/;
  Route::delete('users/{id}', 'UserController@destroy')->name('users.destroy')/*->middleware('')*/;
});

Route::get('asignar-permisos-a-rol/create', 'AssignPermissionsToRolController@create')->name('permissionsToRol.create');
Route::post('asignar-permisos-a-rol/store', 'AssignPermissionsToRolController@store') ->name('permissionsToRol.store');

Route::get('asignar-roles-a-usuario/create', 'AssignRolesToUserController@create')->name('rolesToUser.create');
Route::post('asignar-roles-a-usuario/store', 'AssignRolesToUserController@store') ->name('rolesToUser.store');

//Plantilla rutas
// Route::group(['middleware'=>['auth']], function() {
//     Route::get('algo', 'Controller@index')          ->name('algo.index')  /*->middleware('permission:')*/;
//     Route::get('algo/create', 'Controller@create')  ->name('algo.create') /*->middleware('')*/;
//     Route::post('algo/store', 'Controller@store')   ->name('algo.store')  /*->middleware('')*/;
//     Route::get('algo/{id}', 'Controller@show')      ->name('algo.show')   /*->middleware('')*/;
//     Route::get('algo/{id}/edit', 'Controller@edit') ->name('algo.edit')   /*->middleware('')*/;
//     Route::patch('algo/{id}', 'Controller@update')  ->name('algo.update') /*->middleware('')*/;
//     Route::delete('algo/{id}', 'Controller@destroy')->name('algo.destroy')/*->middleware('')*/;
// });