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
	Route::group(['middleware'=>'lang'], function(){

		Route::get('lang/{lang}','AdminController@lang');
Route::get('/admin-cp',['middleware'=>'dashboard:SuperAdmin,Admin','uses'=>'AdminController@index']);
Route::get('/admin-cp/all-users',['middleware'=>'dashboard:SuperAdmin,Admin', 'as'=>"all-users",'uses'=>'AdminController@allUsers']);

// add new product get
Route::get('/admin-cp/add-new-product',['middleware'=>'dashboard:SuperAdmin,Admin','uses'=>'AdminController@addNewProduct']);
// add new product post save
Route::post('/admin-cp/add-new-product',['middleware'=>'dashboard:SuperAdmin,Admin','uses'=>'AdminController@storeProduct']);
// show all product  
Route::get('/admin-cp/all-product',['middleware'=>'dashboard:SuperAdmin,Admin','uses'=>'AdminController@allProduct']);
// show all product  User 
Route::get('/admin-cp/all-product/user/{id}',['middleware'=>'dashboard:SuperAdmin,Admin','uses'=>'AdminController@allProductUser']);
// show product edit form 
Route::get('/product/{id}/edit',['middleware'=>'dashboard:SuperAdmin,Admin','uses'=> 'AdminController@editProduct']);

// update product by user 
Route::patch('update/{id}/product', ['as' => 'product.update', 'uses' => 'AdminController@updateProduct']);
// delete product but  no delete from database
Route::delete('delete/{id}/product', ['as' => 'product.delete', 'uses' => 'AdminController@deleteProduct']);
// restore product after delete 
Route::post('restore/{id}/product', ['as' => 'product.restore', 'uses' => 'AdminController@restoreProduct']);
// delete product for ever from database can't retrieve 
Route::post('delete-forever/{id}/product', ['as' => 'product.deleteforever', 'uses' => 'AdminController@deletforeverProduct']);

/********************************************************

 Route Users

*********************************************************/

Route::get('/user/{id}/edit/{role_name}',['middleware'=>'dashboard:SuperAdmin,Admin','uses'=> 'AdminController@userData']);

Route::get('/user/{id}/edit',['middleware'=>'dashboard:SuperAdmin,Admin','uses'=> 'AdminController@userData']);

Route::patch('update/{id}/user', ['as' => 'users.update', 'uses' => 'AdminController@updateUser']);
// delete user but  no delete from database
Route::delete('delete/{id}/user', ['as' => 'users.delete', 'uses' => 'AdminController@deleteUser']);
// restore user after delete 
Route::post('restore/{id}/user', ['as' => 'users.restore', 'uses' => 'AdminController@restoreUser']);
// delete for ever from database can't retrieve 
Route::post('delete-forever/{id}/user', ['as' => 'users.deleteforever', 'uses' => 'AdminController@deletforeverUser']);
/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','AdminController@welcome' );
Route::post('/','AdminController@postforsan' );

Auth::routes();

Route::get('/home', 'HomeController@index');

});