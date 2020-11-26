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
Route::get('/restaurante/{buscar?}', 'RestauranteController@restaurante')->name('restaurante.restaurante');
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
Route::get('/like/{imagen_id}', 'LikeController@like')->name('like.save');
Route::get('/dislike/{imagen_id}', 'LikeController@dislike')->name('like.delete');
Route::get('/likes', 'LikeController@index')->name('likes');
?>