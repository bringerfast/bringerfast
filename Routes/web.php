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

# Role CRUD
Route::get('/roleIndex', 'RoleController@roleIndex');
Route::get('/roleForm', 'RoleController@roleForm');
Route::post('/roleStore', 'RoleController@roleStore');
Route::get('/roleShow', 'RoleController@roleShow');
Route::get('/roleEditForm', 'RoleController@roleEditForm');
Route::post('/roleUpdate', 'RoleController@roleUpdate');
Route::get('/roleDelete', 'RoleController@roleDelete');

# User CRUD
Route::get('/userIndex', 'UserController@userIndex');
Route::get('/userForm', 'UserController@userForm');
Route::post('/userStore', 'UserController@userStore');
Route::get('/userShow', 'UserController@userShow');
Route::get('/userEditForm', 'UserController@userEditForm');
Route::post('/userUpdate', 'UserController@userUpdate');
Route::get('/userDelete', 'UserController@userDelete');


