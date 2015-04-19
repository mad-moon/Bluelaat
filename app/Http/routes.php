<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//admin's routes
Route::get('admin',["middleware"=>'not_admin', 'uses' => 'AdminController@index']);
//login&logout routes
Route::match(array('get','post'),'admin/login',['middleware'=>'admin','uses'=>'AdminController@login']);
Route::get('admin/logout',array('middleware'=>'not_admin','uses' => 'AdminController@logout'));
//members routes
Route::get('admin/members',['middleware'=>'not_admin','uses'=>'AdminController@members']);
Route::get('admin/members/show/{id}',['middleware'=>'not_admin','uses'=>'AdminController@members_show']);
Route::match(array('get','post'),'admin/members/add',['middleware'=>'not_admin','uses'=>'AdminController@members_add']);
Route::match(array('get','post'),'admin/members/edit/{id}',['middleware'=>'not_admin','uses'=>'AdminController@members_edit']);
Route::match(array('get','post'),'admin/members/delete/{id}',['middleware'=>'not_admin','uses'=>'AdminController@members_delete']);
Route::match(array('get','post'),'admin/settings',['middleware'=>'not_admin','uses'=>'AdminController@settings']);
//services sections routes
Route::get('admin/services/sections',['middleware'=>'not_admin','uses'=>'AdminController@Ssections']);
Route::match(array('post','get'),'admin/services/sections/add',['middleware'=>'not_admin','uses'=>'AdminController@Ssections_add']);
Route::match(array('post','get'),'admin/services/sections/edit/{id}',['middleware'=>'not_admin','uses'=>'AdminController@Ssections_edit']);
Route::match(array('post','get'),'admin/services/sections/delete/{id}',['middleware'=>'not_admin','uses'=>'AdminController@Ssections_delete']);
//services routes
Route::get('admin/services',['middleware'=>'not_admin','uses'=>'AdminController@services']);
Route::get('admin/services/show/{id}',['middleware'=>'not_admin','uses'=>'AdminController@services_show']);
Route::match(array('get','post'),'admin/services/add',['middleware'=>'not_admin','uses'=>'AdminController@services_add']);
Route::match(array('get','post'),'admin/services/edit/{id}',['middleware'=>'not_admin','uses'=>'AdminController@services_edit']);
Route::match(array('get','post'),'admin/services/delete/{id}',['middleware'=>'not_admin','uses'=>'AdminController@services_delete']);
//bills routes
Route::get('admin/bills',['middleware'=>'not_admin','uses'=>'AdminController@bills']);
Route::get('admin/bills/show/{id}',['middleware'=>'not_admin','uses'=>'AdminController@bills_show']);
Route::match(array('get','post'),'admin/bills/add',['middleware'=>'not_admin','uses'=>'AdminController@bills_add']);
Route::match(array('get','post'),'admin/bills/edit/{id}',['middleware'=>'not_admin','uses'=>'AdminController@bills_edit']);
Route::match(array('get','post'),'admin/bills/delete/{id}',['middleware'=>'not_admin','uses'=>'AdminController@bills_delete']);
//tickets sections routes
Route::get('admin/tickets/sections',['middleware'=>'not_admin','uses'=>'AdminController@Tsections']);
Route::match(array('post','get'),'admin/tickets/sections/add',['middleware'=>'not_admin','uses'=>'AdminController@Tsections_add']);
Route::match(array('post','get'),'admin/tickets/sections/edit/{id}',['middleware'=>'not_admin','uses'=>'AdminController@Tsections_edit']);
Route::match(array('post','get'),'admin/tickets/sections/delete/{id}',['middleware'=>'not_admin','uses'=>'AdminController@Tsections_delete']);
//tickets routes
Route::get('admin/tickets',['middleware'=>'not_admin','uses'=>'AdminController@tickets']);
Route::match(array('get','post'),'admin/tickets/show/{id}',['middleware'=>'not_admin','uses'=>'AdminController@tickets_show']);
Route::match(array('get','post'),'admin/tickets/open/{id}',['middleware'=>'not_admin','uses'=>'AdminController@tickets_open']);
Route::match(array('get','post'),'admin/tickets/close/{id}',['middleware'=>'not_admin','uses'=>'AdminController@tickets_close']);
Route::match(array('get','post'),'admin/tickets/delete/{id}',['middleware'=>'not_admin','uses'=>'AdminController@tickets_delete']);
//tickets comments routes
Route::match(array('get','post'),'admin/tickets/comments/edit/{id}',['middleware'=>'not_admin','uses'=>'AdminController@Tcomments_edit']);
Route::match(array('get','post'),'admin/tickets/comments/delete/{id}',['middleware'=>'not_admin','uses'=>'AdminController@Tcomments_delete']);


// site's controllers

//members controllers
Route::get('members',['middleware'=>['member','close'],'uses'=>'MembersController@index']);
Route::get('members/bills/{id?}',['middleware'=>['member','active','close'],'uses'=>'MembersController@bills']);
Route::match(array('post','get'),'members/tickets/addticket',['middleware'=>['member','active','close'],'uses'=>'MembersController@addticket']);
Route::match(array('post','get'),'members/tickets/{id?}',['middleware'=>['member','active','close'],'uses'=>'MembersController@tickets']);
Route::match(array('post','get'),'members/info/',['middleware'=>['member','active','close'],'uses'=>'MembersController@info']);
Route::match(array('post','get'),'members/info/',['middleware'=>['member','active','close'],'uses'=>'MembersController@info']);

//members registeration system
Route::match(array('get','post'),'login',['middleware'=>['guest','close'],'uses'=>'MembersController@login']);
Route::get('logout',['middleware'=>['close'],'uses'=>'MembersController@logout']);
Route::match(array('get','post'),'register',['middleware'=>['guest','close'],'uses'=>'MembersController@register']);
Route::match(array('get','post'),'restore/{restore?}',['middleware'=>['guest','close'],'uses'=>'MembersController@restore']);
Route::get('active/{activec?}',['middleware'=>'close','uses'=>'MembersController@active']);

//pages controllers 
Route::get('/',['middleware'=>'close',function(){
	if(!Schema::hasTable('settings') or !Settings::where('id',1)->count()){
		return Redirect::to('install');
	}else{
		return View::make('host.contents.index');
	}
}]);
Route::get('pages/aboutus',['middleware'=>'close','uses'=>'PagesController@aboutus']);
Route::get('pages/hosting',['middleware'=>'close','uses'=>'PagesController@hosting']);
Route::match(array('get','post'),'pages/contactus',['middleware'=>'close','uses'=>'PagesController@contactus']);
//services controllers
Route::get('services/{section?}',['middleware'=>'close','uses'=>'ServicesController@index']);
Route::match(array('get','post'),'services/order/{servicename}',['middleware'=>['member','active','close'],'uses'=>'ServicesController@order']);

//Install
Route::match(array('get','post'),'install','InstallController@index');
Route::match(array('get','post'),'install/info','InstallController@info');
Route::match(array('get','post'),'install/admin','InstallController@admin');
Route::get('install/check','InstallController@check');
Route::get('install/done','InstallController@done');
