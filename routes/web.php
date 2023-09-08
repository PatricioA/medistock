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
    return view('welcome');
});

// Route::get('/Test', 'TestController@index')->name('usuarios'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Home', 'HomeController@index')->name('home'); 

Route::get('/Usuarios', 'UserController@index')->name('usuarios'); 

Route::get('editar/{id}', 'UserController@editar')->name('usuario.editar');

Route::put('editar/{id}', 'UserController@update')->name('usuario.update');

Route::get('/InsumosTipo', 'TipoinsumoController@index')->name('insumos.tipo');

Route::get('/InsumosTipo/Crea', 'TipoinsumoController@create')->name('insumos.tipocrea');

Route::post('/InsumosTipo/', 'TipoinsumoController@store')->name('insumos.tipostore');

Route::get('/Insumos', 'InsumosController@index')->name('insumos');

Route::get('/Insumos/Crea', 'InsumosController@create')->name('insumoscrea');

Route::get('/Insumos/{id}', 'InsumosController@devolver')->name('devolver.crea');

Route::put('devolucionUpdate/{id}', 'InsumosController@devolverUpdate')->name('devolver.update');

Route::put('editar/{id}', 'UserController@update')->name('usuario.update');

Route::post('/Insumos', 'InsumosController@store')->name('insumos.store');

Route::get('/eliminarI/{id}', 'InsumosController@destroy')->name('insumo.anular');

Route::get('/activarIn/{id}', 'InsumosController@activar')->name('insumo.activar');

Route::get('/Insumos/Exporta', 'InsumosController@exportInsumos')->name('insumos.export');

Route::get('/Pedidos', 'PedidosController@index')->name('pedidos.index');

Route::get('/Pedidos/Crea', 'PedidosController@create')->name('pedidos.crea');

Route::post('/Pedidos', 'PedidosController@store')->name('pedidos.store');

Route::get('Pedidos/{id}', 'PedidosController@verPedidos')->name('pedidos.ver');

Route::get('/eliminar/{id}', 'PedidosController@destroy')->name('pedido.anular');

Route::get('/get-options', 'PedidosController@getOptions')->name('opciones');

Route::get('/datoselect', 'PedidosController@selectDB')->name('select');

Route::get('/Entregas', 'EntregaController@index')->name('entrega.index');

Route::get('/Entregas/Crea', 'EntregaController@create')->name('entrega.crea');

Route::post('/Entregas', 'EntregaController@store')->name('entrega.store');

Route::get('/Reportes', 'InsumosController@reportevs')->name('report.index');


