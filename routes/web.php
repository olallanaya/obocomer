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
//use App\Imagen;

Route::get('/', function () {
    
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//user controladores
Route::get('/configuracion', 'UserController@config')->name('config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::get('/perfil/{id}', 'UserController@perfil')->name('perfil');
Route::get('/people/{buscar?}', 'UserController@usuarios')->name('user.usuarios');
//restaurante controladores
Route::get('/restaurante/{atopar?}', 'RestauranteController@restaurante')->name('restaurante.restaurante');
Route::get('/admin/restaurante/{filename}', 'RestauranteController@getImage')->name('restaurante.imagen');
Route::get('/restaurante/detalle/{id?}', 'RestauranteController@detalle')->name('restaurante.detalle');

// reserva
Route::get('/reserva', 'ReservaController@create')->name('reserva.create');
Route::post('/reserva/save', 'ReservaController@save')->name('reserva.save');


Route::post('/restaurante/save', 'RestauranteController@save')->name('restaurante.save');
//Imagen controlador
Route::get('/subida-imagen', 'ImageController@create')->name('image.create');
Route::post('/image/save', 'ImageController@save')->name('image.save');
Route::get('/image/file/{filename}', 'ImageController@getImage')->name('image.file');
Route::get('/imagen/{id}', 'ImageController@detalle')->name('image.detalle');
Route::get('/imagen/borrar/{id}', 'ImageController@borrar')->name('image.borrar');
Route::get('/imagen/editar/{id}', 'ImageController@edit')->name('image.edit');

//Rutas del controlador comentario
Route::post('/comentario/save', 'ComentariosController@save')->name('comentario.save');
Route::get('/commentario/borrar/{id}', 'ComentariosController@borrar')->name('comentario.borrar');

// Rutas del controlador like 

Route::get('/like/{image_id}', 'LikeController@like')->name('like.save');
Route::get('/dislike/{image_id}', 'LikeController@dislike')->name('like.delete');
Route::get('/likes', 'LikeController@index')->name('likes');

// rutas del middleware administrador
Route::group(['middleware' => 'admin'], function () {
Route::get('/admin/novo', 'RestauranteController@create')->name('restaurante.create');
Route::post('/admin/restaurante/save', 'RestauranteController@save')->name('restaurante.save');
});
