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

//Route::   get 请求方式  ('访问的路径',function(){ 处理 })
// 路由  控制器  中间  视图  
// 
Route::get('/', function () {
	echo "welcome";
});

Route::get("/userad","UserController@ajaxdel");
Route::resource('/user','UserController');
Route::resource('/users','UsersController');
Route::resource('/db','DbController');
Route::get('/usersadd/{id}',"UsersController@getadd");
Route::get('/liuliu',"UsersController@liuliu");
Route::get('/useclass',"UsersController@useclass");