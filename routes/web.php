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
  Route::get('roles', 'RolesController@index')          ->name('roles.index')   ->middleware('permission:roles.index');
  Route::get('roles/create', 'RolesController@create')  ->name('roles.create')  ->middleware('permission:roles.create');;
  Route::post('roles/store', 'RolesController@store')   ->name('roles.store')   ->middleware('permission:roles.store');;
  Route::get('roles/{id}', 'RolesController@show')      ->name('roles.show')    ->middleware('permission:roles.show');;
  Route::get('roles/{id}/edit', 'RolesController@edit') ->name('roles.edit')    ->middleware('permission:roles.edit');;
  Route::patch('roles/{id}', 'RolesController@update')  ->name('roles.update')  ->middleware('permission:roles.update');;
  Route::delete('roles/{id}', 'RolesController@destroy')->name('roles.destroy') ->middleware('permission:roles.destroy');;
});

//Rutas para los permisos
Route::group(['middleware'=>['auth']], function() {
  Route::get('permisos', 'PermissionsController@index')          ->name('permisos.index')  ->middleware('permission:permisos.index');
  Route::get('permisos/create', 'PermissionsController@create')  ->name('permisos.create') ->middleware('permission:permisos.create');
  Route::post('permisos/store', 'PermissionsController@store')   ->name('permisos.store')  ->middleware('permission:permisos.store');
  Route::get('permisos/{id}', 'PermissionsController@show')      ->name('permisos.show')   ->middleware('permission:permisos.show');
  Route::get('permisos/{id}/edit', 'PermissionsController@edit') ->name('permisos.edit')   ->middleware('permission:permisos.edit');
  Route::patch('permisos/{id}', 'PermissionsController@update')  ->name('permisos.update') ->middleware('permission:permisos.update');
  Route::delete('permisos/{id}', 'PermissionsController@destroy')->name('permisos.destroy')->middleware('permission:permisos.destroy');
});

//Rutas para los usuarios
Route::group(['middleware'=>['auth']], function() {
  Route::get('users', 'UserController@index')          ->name('users.index')  ->middleware('permission:users.index');
  Route::get('users/create', 'UserController@create')  ->name('users.create') ->middleware('permission:users.create');
  Route::post('users/store', 'UserController@store')   ->name('users.store')  ->middleware('permission:users.store');
  Route::get('users/{id}', 'UserController@show')      ->name('users.show')   ->middleware('permission:users.show');
  Route::get('users/{id}/edit', 'UserController@edit') ->name('users.edit')   ->middleware('permission:users.edit');
  Route::patch('users/{id}', 'UserController@update')  ->name('users.update') ->middleware('permission:users.update');
  Route::delete('users/{id}', 'UserController@destroy')->name('users.destroy')->middleware('permission:users.destroy');
  
  Route::get('users/edit-name/{id}', 'UserController@edit_name')->name('users.edit_name')                     ->middleware('permission:users.edit_name');
  Route::patch('users/update-name/{id}', 'UserController@update_name')->name('users.update_name')             ->middleware('permission:users.update_name');
  Route::get('users/edit-password/{id}', 'UserController@edit_password')->name('users.edit_password')         ->middleware('permission:users.edit_password');
  Route::patch('users/update-password/{id}', 'UserController@update_password')->name('users.update_password') ->middleware('permission:users.update_password');
  Route::get('usuarios', 'UserController@index_table')->name('usuarios.index_table')                          ->middleware('permission:users.index_table');
});

Route::get('asignar-permisos-a-rol/create', 'AssignPermissionsToRolController@create')->name('permissionsToRol.create') ->middleware('permission:permissionsToRol.create');
Route::post('asignar-permisos-a-rol/store', 'AssignPermissionsToRolController@store') ->name('permissionsToRol.store')  ->middleware('permission:permissionsToRol.store');

Route::get('asignar-roles-a-usuario/create', 'AssignRolesToUserController@create')->name('rolesToUser.create')->middleware('permission:rolesToUser.create');
Route::post('asignar-roles-a-usuario/store', 'AssignRolesToUserController@store') ->name('rolesToUser.store') ->middleware('permission:rolesToUser.store');

Route::post('importar-excel-bd/importar', 'ExportImportExcelController@importar_desde_excel')->name('excel.import');
Route::get('importar-excel-bd/create', 'ExportImportExcelController@create')->name('excel.create')->middleware(['role:Super Admin', 'permission:create.excel']);

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