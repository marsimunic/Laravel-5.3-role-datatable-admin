<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
/*Route::get('/admin', function () {
    return view('tabla1');
});

Route::get('/admin.data', function () {
    return Datatables::of(App\User::query())->make(true);
});*/
Auth::routes();
Route::group(['middleware' => ['auth']], function() {
	Route::resource('users','UserController');
	/*Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);*/
	Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:create-user']]);
	Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:create-user']]);
	Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:create-user']]);
	Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:create-user']]);
	Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:create-user']]);
	Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:create-user']]);
	Route::get('/home', 'HomeController@index');
	Route::get('/', 'DatatablesController@Index');
	Route::get('/tabla1', 'DatatablesController@Index');
	Route::get('/tabla1.data', 'DatatablesController@Data');
	Route::get('/tabla2', 'DatatablesController@IndexTabla2');
	Route::get('/tabla2.data', 'DatatablesController@DataTabla2');
	Route::get('/tabla3', 'DatatablesController@getAddEditRemoveColumn');
	Route::get('/tabla3.data', 'DatatablesController@getAddEditRemoveColumnData');
	Route::get('/test/{id}', function ($id) 
	{
    	return App\User::find($id)->load(['roles' => function ($q) {
            $q->with('perms');
        }
    	]);
	});
	Route::get('/testuser', function(){
		return App\User::where('id', '=', '103')->first();
	});
});

//Route::controller('admin', 'DatatablesController', [
//    'admin.data'  => 'Data',
//    'admin' => 'Index',

