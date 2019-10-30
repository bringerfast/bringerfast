<?php

# Welcome Route
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

# Movie Category CRUD
Route::get('/movieCategoryIndex', 'MovieCategoryController@movieCategoryIndex');
Route::get('/movieCategoryForm', 'MovieCategoryController@movieCategoryForm');
Route::post('/movieCategoryStore', 'MovieCategoryController@movieCategoryStore');
Route::get('/movieCategoryShow', 'MovieCategoryController@movieCategoryShow');
Route::get('/movieCategoryEditForm', 'MovieCategoryController@movieCategoryEditForm');
Route::post('/movieCategoryUpdate', 'MovieCategoryController@movieCategoryUpdate');
Route::get('/movieCategoryDelete', 'MovieCategoryController@movieCategoryDelete');

# Movie CRUD
Route::get('/movieIndex', 'MovieController@movieIndex');
Route::get('/movieForm', 'MovieController@movieForm');
Route::post('/movieStore', 'MovieController@movieStore');
Route::get('/movieShow', 'MovieController@movieShow');
Route::get('/movieEditForm', 'MovieController@movieEditForm');
Route::post('/movieUpdate', 'MovieController@movieUpdate');
Route::get('/movieDelete', 'MovieController@movieDelete');

# Class Type CRUD
Route::get('/classTypeIndex', 'ClassTypeController@classTypeIndex');
Route::get('/classTypeForm', 'ClassTypeController@classTypeForm');
Route::post('/classTypeStore', 'ClassTypeController@classTypeStore');
Route::get('/classTypeShow', 'ClassTypeController@classTypeShow');
Route::get('/classTypeEditForm', 'ClassTypeController@classTypeEditForm');
Route::post('/classTypeUpdate', 'ClassTypeController@classTypeUpdate');
Route::get('/classTypeDelete', 'ClassTypeController@classTypeDelete');

# Show Type CRUD
Route::get('/showIndex', 'ShowController@showIndex');
Route::get('/showForm', 'ShowController@showForm');
Route::post('/showStore', 'ShowController@showStore');
Route::get('/showShow', 'ShowController@showShow');
Route::get('/showEditForm', 'ShowController@showEditForm');
Route::post('/showUpdate', 'ShowController@showUpdate');
Route::get('/showDelete', 'ShowController@showDelete');




