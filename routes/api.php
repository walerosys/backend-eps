<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', 'JWTAuthController@register');
    Route::post('login', 'JWTAuthController@login');
    Route::post('logout', 'JWTAuthController@logout');
    Route::post('refresh', 'JWTAuthController@refresh');
    Route::get('profile', 'JWTAuthController@profile');
    Route::post('update', 'JWTAuthController@update');
    Route::get('allusuario', 'JWTAuthController@getallusuario');
    Route::post('deleteusuario', 'JWTAuthController@destroy');
    //actividad
    Route::post('registeractividad', 'ActividadController@register');
    Route::post('updateactividad', 'ActividadController@update');
    Route::post('deleteactividad', 'ActividadController@destroy');
    Route::get('showactividadid', 'ActividadController@getActividadId');
    Route::get('allactividad', 'ActividadController@getallactividad');
    Route::get('buscaractividad', 'ActividadController@buscar');
    //tipo de instalacion
    Route::post('registertipo', 'TipodeinstalacionController@register');
    Route::post('updatetipo', 'TipodeinstalacionController@update');
    Route::post('deletetipo', 'TipodeinstalacionController@destroy');
    Route::get('alltipo', 'TipodeinstalacionController@getalltipo');
    Route::get('buscartipo', 'TipodeinstalacionController@buscar');
    //instalacion
    Route::post('registerinstalacion', 'InstalacionController@registerinsta');
    Route::get('allinstalacion', 'InstalacionController@getInstalacion');
    //usuario del servicio
    Route::get('alluservicio', 'UsuarioDelServicioController@getallusservicio');
    Route::post('registerus', 'UsuarioDelServicioController@register');
    
});
