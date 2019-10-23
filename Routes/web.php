<?php

# Test Welcome Route
Route::get('/',function (Request $request){
    export('welcome',[]);
});

# Super Admin Auth
Route::get('/admin', 'LoginController@index');
Route::post('/admin', 'LoginController@adminLogin');
Route::get('/adminLogout', 'LoginController@adminLogout');
Route::post('/sendResetEmail','LoginController@sendResetEmail');

# User CRUD
Route::get('/test','UserController@index');

# Role CRUD
Route::get('/roleIndex', 'RoleController@roleIndex');
Route::get('/roleForm', 'RoleController@roleForm');
Route::post('/roleStore', 'RoleController@roleStore');
Route::get('/roleShow', 'RoleController@roleShow');
Route::get('/roleEditForm', 'RoleController@roleEditForm');
Route::post('/roleUpdate', 'RoleController@roleUpdate');
Route::get('/roleDelete', 'RoleController@roleDelete');


