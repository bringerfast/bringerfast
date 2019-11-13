<?php
#============= Frontend Routes ==============================
Route::get('/','FrontController@home');
Route::get('/details','FrontController@details');
Route::post('/booking','FrontController@booking');

#============= Backend Routes ==============================
# Authentications
Route::get('/admin', 'LoginController@adminLoginForm');
Route::get('/adminRegisterForm', 'LoginController@adminRegisterForm');
Route::post('/admin', 'LoginController@adminLogin');
Route::post('/adminRegister', 'LoginController@adminRegister');
Route::post('/sendResetEmail','LoginController@sendResetEmail');
Route::get('/logout', 'LoginController@logout');
Route::get('/dashboard','DashboardController@dashboard');

# Admin Reset Password
Route::post('/sendOTP','ResetController@sendOTP');
Route::post('/resetAdmin','ResetController@resetAdmin');

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

# Theatres CRUD
Route::get('/theatreIndex', 'TheatreController@theatreIndex');
Route::get('/theatreForm', 'TheatreController@theatreForm');
Route::post('/theatreStore', 'TheatreController@theatreStore');
Route::get('/theatreShow', 'TheatreController@theatreShow');
Route::get('/theatreEditForm', 'TheatreController@theatreEditForm');
Route::post('/theatreUpdate', 'TheatreController@theatreUpdate');
Route::get('/theatreDelete', 'TheatreController@theatreDelete');

# Screen CRUD
Route::get('/screenIndex', 'ScreenController@screenIndex');
Route::get('/screenForm', 'ScreenController@screenForm');
Route::post('/screenStore', 'ScreenController@screenStore');
Route::get('/screenShow', 'ScreenController@screenShow');
Route::get('/screenEditForm', 'ScreenController@screenEditForm');
Route::post('/screenUpdate', 'ScreenController@screenUpdate');
Route::get('/screenDelete', 'ScreenController@screenDelete');
Route::post('/getScreenOfTheatre','ScreenController@getScreenOfTheatre');

# Movie Of Screen CRUD
Route::get('/movieOfScreenIndex', 'MovieOfScreenController@index');
Route::get('/movieOfScreenForm', 'MovieOfScreenController@create');
Route::post('/movieOfScreenStore', 'MovieOfScreenController@store');
Route::get('/movieOfScreenShow', 'MovieOfScreenController@show');
Route::get('/movieOfScreenEditForm', 'MovieOfScreenController@edit');
Route::post('/movieOfScreenUpdate', 'MovieOfScreenController@update');
Route::get('/movieOfScreenDelete', 'MovieOfScreenController@delete');



