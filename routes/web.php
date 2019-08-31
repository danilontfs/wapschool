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


//ROTAS DA PALESTRA
Route::group(['prefix'=>'/palestras','middleware'=>'auth'],function(){
  Route::get('/','Wapschool\PalestraController@index')->name('listarPalestras');

  Route::get('/adicionar','Wapschool\PalestraController@create')->name('adicionarPalestra');
  Route::post('/adicionar','Wapschool\PalestraController@store')->name('adicionarPalestraPost');

  Route::get('/atualizar/{id}','Wapschool\PalestraController@edit')->where(['id'=>'[0-9]+'])->name('atualizarPalestra');
  Route::put('/atualizar/{id}','Wapschool\PalestraController@update')->where(['id'=>'[0-9]+'])->name('atualizarPalestraPut');

  Route::delete('/remover/{id}','Wapschool\PalestraController@destroy')->where(['id'=>'[0-9]+'])->name('removerPalestra');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
