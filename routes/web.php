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
/*Route::put('post/{id}', function ($id) {
    //
})->middleware('auth', 'role:admin');*/
//Route::get('/', function(){

//  return view('home');
//});
//Route::get('sendbasicemail','MailController@basic_email');
//Route::get('sendhtmlemail','MailController@html_email');

Route::get('sendattachmentemail','MailController@attachment_email');
Route::get('/correo','CatalogController@enviaCorreo');

Route::get('/', 'HomeController@getHome');

Route::get('/catalog', 'CatalogController@getIndex');

Route::get('/catalog/show/{id}', 'CatalogController@getShow');

Route::get('/catalog/create', 'CatalogController@getCreate');
Route::post('/catalog/create', 'CatalogController@postCreate');

Route::get('/catalog/edit/{id}', 'CatalogController@getEdit');
Route::put('/catalog/edit/{id}', 'CatalogController@putEdit');

Route::delete('/catalog/edit/{id}', 'CatalogController@putDelete')->middleware('auth', 'role:admin');

Route::get('/fecha',function(){
  $date = getdate();
  $dia = $date["mday"];
  $diasemana = $date["weekday"];
  $mes = $date["month"];
  $anio = $date["year"];

  return view('fecha', array('dsemana' => $diasemana, 'dia' => $dia, 'mes' => $mes, 'anio' => $anio));
});

/*Route::get('/auth/login',function(){

  return view('auth/login');

});*/


/*
Route::get('/catalog',function(){

  return view('catalog/index');

});*/

/*Route::get('/catalog/show/{id}', function($id){

  return view('catalog/show', array('id'=>$id));
});*/

/*Route::get('/catalog/create',function(){

  return view('catalog/create');

});*/

/*Route::get('/catalog/edit/{id}',function(){

  return view('catalog/edit');
})
;*/
 /*
Route::get('/user/{id?}', function ( $id = null) {
    return "Parámetro opcional" . $id;
});

Route::get('/users/{name?}', function($name = 'Ivan'){
  return "Parametro por defecto " . $name;
});

Route::post('/users/add', function(){
  return 'hola ';
});

/*Route::match(array('GET','POST'), '/', function(){
  return "hola";
});*/
/*
Route::get('usuario/{id}', function($id){

})->where('id', '[0-9]+');

Route::get('catalog/{name}/{id}', function($id,$name){


})->where(array('name' => '[A-Za-z]+' , 'id' => '[0-9]+'));

*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
