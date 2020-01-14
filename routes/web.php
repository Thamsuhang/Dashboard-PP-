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

Route::group(['namespace'=>'Frontend'], function ()
{
   Route::any('/','ApplicationController@index')->name('index');
});

Route::group(['namespace'=>'Backend' ], function () {

Route::any('userLogin','AdminController@userLogin')->name('userLogin');
});

Route::group(['namespace'=>'Backend','prefix'=>'@admin-project','middleware'=>'auth'], function ()
{
   Route::any('/','DashboardController@index')->name('dashboard');
   Route::group(['prefix'=>'privilege'], function ()
{
Route::any('/','PrivilegeController@index')->name('privilege');
Route::any('add-privilege','PrivilegeController@addPrivilege')->name('add-privilege');
Route::any('delete-privilege/{id?}','PrivilegeController@deletePrivilege')->name('delete-privilege');
Route::any('edit-privilege/{id?}','PrivilegeController@editPrivilege')->name('edit-privilege');
Route::any('edit-privilege-action','PrivilegeController@editPrivilegeAction')->name('edit-privilege-action');
Route::any('update-privilege-status','PrivilegeController@updatePrivilegeStatus')->name('update-privilege-status');

});
   Route::group(['prefix'=>'users'],function ()
   {
      Route::any('','AdminController@index')->name('users');
      Route::any('add-user','AdminController@addUser')->name('add-user');
      Route::any('add-user-action','Admincontroller@addUserAction')->name('add-user-action');
      Route::any('delete-user/{id?}','Admincontroller@deleteUser')->name('delete-user');
      Route::any('edit-user','Admincontroller@editUser')->name('edit-user');


   });
      Route::any('logout','AdminController@logout')->name('logout');

});

