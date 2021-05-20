<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



Route::middleware(['auth'])->group(function(){

	Route::get('admin/home', 'HomeController@index')->name('home');
	Route::get('home', 'HomeController@index')->name('home');
	Route::get('home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Roles
|--------------------------------------------------------------------------
|
*/
	Route::post('admin/roles/store', 'RoleController@store')->middleware('permiso:roles.store'); 
	Route::get('admin/roles', 'RoleController@index')->middleware('permiso:roles.index'); 
	Route::get('admin/roles/create', 'RoleController@create')->middleware('permiso:roles.create'); 
	Route::post('admin/roles/{id}/edit', 'RoleController@update')->middleware('permiso:roles.update'); 
	Route::get('admin/roles/{id}', 'RoleController@show')->middleware('permiso:roles.show'); 
	Route::delete('admin/roles/{id}', 'RoleController@destroy')->middleware('permiso:roles.destroy'); 
	Route::get('admin/roles/{id}/edit', 'RoleController@edit')->middleware('permiso:roles.edit'); 

/*
|--------------------------------------------------------------------------
| Permission
|--------------------------------------------------------------------------
|
*/
	Route::get('admin/permissions', 'PermissionController@index')->middleware('permiso:permissions.index'); 

/*
|--------------------------------------------------------------------------
| Users
|--------------------------------------------------------------------------
|
*/
	Route::post('admin/users/store', 'UserController@store')->middleware('permiso:users.store'); 
	Route::get('admin/users', 'UserController@index')->middleware('permiso:users.index'); 
	Route::get('admin/users/create', 'UserController@create')->middleware('permiso:users.create'); 
	Route::post('admin/users/{id}/edit', 'UserController@update')->middleware('permiso:users.update'); 
	Route::delete('admin/users/{id}', 'UserController@destroy')->middleware('permiso:users.destroy'); 
	Route::get('admin/users/{id}/edit', 'UserController@edit')->middleware('permiso:users.edit'); 
	Route::post('admin/users/{id}/active', 'UserController@active')->middleware('permiso:users.active'); 
	Route::post('admin/users/{id}/inactive', 'UserController@inactive')->middleware('permiso:users.inactive'); 
	Route::post('admin/users/pwd', 'UserController@pwd')->name('usuarios.pwd'); 
	
	Route::get('admin/perfil', 'UserController@show')->middleware('permiso:usuarios.show'); 
	Route::get('admin/perfil/{id}/edit', 'UserController@editarperfil')->middleware('permiso:usuarios.editarperfil'); 
	Route::post('admin/perfil/{id}/edit', 'UserController@updateperfil')->middleware('permiso:usuarios.updateperfil'); 

/*
|--------------------------------------------------------------------------
| Cities
|--------------------------------------------------------------------------
|
*/
	Route::post('admin/cities/store', 'CitiesController@store')->middleware('permiso:cities.store'); 
	Route::get('admin/cities', 'CitiesController@index')->middleware('permiso:cities.index'); 
	Route::get('admin/cities/create', 'CitiesController@create')->middleware('permiso:cities.create'); 
	Route::post('admin/cities/{id}/edit', 'CitiesController@update')->middleware('permiso:cities.update'); 
	Route::delete('admin/cities/{id}', 'CitiesController@destroy')->middleware('permiso:cities.destroy'); 
	Route::get('admin/cities/{id}/edit', 'CitiesController@edit')->middleware('permiso:cities.edit'); 
	Route::post('admin/cities/{id}/active', 'CitiesController@active')->middleware('permiso:cities.active'); 
	Route::post('admin/cities/{id}/inactive', 'CitiesController@inactive')->middleware('permiso:cities.inactive'); 


/*
|--------------------------------------------------------------------------
| Clients
|--------------------------------------------------------------------------
|
*/

	Route::post('admin/clients/store', 'ClientsController@store')->middleware('permiso:clients.store'); 
	Route::get('admin/clients', 'ClientsController@index')->middleware('permiso:clients.index'); 
	Route::get('admin/clients/create', 'ClientsController@create')->middleware('permiso:clients.create'); 
	Route::post('admin/clients/{id}/edit', 'ClientsController@update')->middleware('permiso:clients.update'); 
	Route::delete('admin/clients/{id}', 'ClientsController@destroy')->middleware('permiso:clients.destroy');  
	Route::get('admin/clients/{id}/edit', 'ClientsController@edit')->middleware('permiso:clients.edit'); 
	Route::post('admin/clients/{id}/active', 'ClientsController@active')->middleware('permiso:clients.active'); 
	Route::post('admin/clients/{id}/inactive', 'ClientsController@inactive')->middleware('permiso:clients.inactive'); 

});