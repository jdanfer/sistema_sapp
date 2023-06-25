<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['register' => false]);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/enviar_correo', 'App\Http\Controllers\AdminController@sendCorreo');
Route::get('/crearexcel', 'App\Http\Controllers\AdminController@crearExcel');
//Route::get('procesos/arqueo/cobrados', 'App\Http\Controllers\AdminController@showCobrados');

Route::group(['middleware' => 'auth'], function () {
    //    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::get('admin/settings', ['as' => 'admin.settings', 'uses' => 'App\Http\Controllers\AdminController@showUser']);
    Route::put('profile/update', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::get('profile', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
    //Cargos
    Route::get('admin/cargos/crear', ['as' => 'admin/cargos/crear', 'uses' => 'App\Http\Controllers\AdminController@showCargoCreate']);
    Route::get('admin/cargos', ['as' => 'admin/cargos', 'uses' => 'App\Http\Controllers\AdminController@showCargo']);
    Route::get('admin/cargos/{id}/editar', ['as' => 'admin/cargos/{id}/editar', 'uses' => 'App\Http\Controllers\AdminController@showCargoEdit']);
    Route::post('admin/cargos/{id}/editar', ['as' => 'admin/cargos/{id}/editar', 'uses' => 'App\Http\Controllers\AdminController@editCargo']);
    Route::get('admin/cargos/{id}/eliminar', ['as' => 'admin/cargos/{id}/eliminar', 'uses' => 'App\Http\Controllers\AdminController@deleteCargo']);
    Route::post('admin/cargos', ['as' => 'admin/cargos', 'uses' => 'App\Http\Controllers\AdminController@createCargo']);
    ///Períodos
    Route::get('admin/periodos/crear', ['as' => 'admin/periodos/crear', 'uses' => 'App\Http\Controllers\AdminController@showPeriodoCreate']);
    Route::get('admin/periodos', ['as' => 'admin/periodos', 'uses' => 'App\Http\Controllers\AdminController@showPeriodo']);
    Route::get('admin/periodos/{id}/editar', ['as' => 'admin/periodos/{id}/editar', 'uses' => 'App\Http\Controllers\AdminController@showPeriodoEdit']);
    Route::post('admin/periodos/{id}/editar', ['as' => 'admin/periodos/{id}/editar', 'uses' => 'App\Http\Controllers\AdminController@editPeriodo']);
    Route::get('admin/periodos/{id}/eliminar', ['as' => 'admin/periodos/{id}/eliminar', 'uses' => 'App\Http\Controllers\AdminController@deletePeriodo']);
    Route::post('admin/periodos', ['as' => 'admin/periodos', 'uses' => 'App\Http\Controllers\AdminController@createPeriodo']);
});
