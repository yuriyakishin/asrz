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

Route::group(['prefix' => '/','namespace' => 'Site'
], function() {
    Route::get('/','IndexController@index')->name('site.index');
    Route::get('/about','AboutController@index')->name('site.about');
    Route::get('/partner','PartnerController@index')->name('site.partner');
    Route::get('/work','WorkController@index')->name('site.work');
    Route::get('/job','JobController@index')->name('site.job');
    Route::get('/inform','InformController@index')->name('site.inform');
    Route::get('/sertificat','SertificatController@index')->name('site.sertificat');
    Route::get('/contacts','ContactsController@index')->name('site.contacts');
    Route::get('/politic','PoliticController@index')->name('site.politic');
    Route::get('/search','SearchController@index')->name('site.search');
    Route::post('/callback','MailController@callback')->name('site.callback');
    Route::post('/order','MailController@order')->name('site.order');
});

Route::get('/admin/login',['as' => 'admin.login','uses' => 'Admin\LoginController@showLoginForm']);
Route::post('/admin/login',['uses' => 'Admin\LoginController@login']);
Route::get('/admin/logout',['as' => 'admin.logout','uses' => 'Admin\LoginController@logout']);

Route::group(['prefix' => 'admin','namespace' => 'Admin' ,'middleware' => ['isAdmin']
], function() {
    Route::get('/','IndexController@index')->name('admin');
    Route::get('/profile','ProfileController@index')->name('admin.profile');
    Route::post('/profile','ProfileController@update')->name('admin.profile.update');
    Route::post('/image/upload','ImageController@upload')->name('admin.image.upload');
    Route::delete('image/remove/{uuid}','ImageController@remove')->name('admin.image.remove');
    Route::post('/image/editorupload','ImageController@editorupload')->name('admin.image.editorupload');
    Route::resource('/job','JobController',['as' => 'admin']);
    Route::resource('/work','WorkController',['as' => 'admin']);
    Route::resource('/service','ServiceController',['as' => 'admin']);
    Route::resource('/partner','PartnerController',['as' => 'admin']);
    Route::resource('/banner','BannerController',['as' => 'admin']);
    Route::resource('/cmssetting','CmsSettingController',['as' => 'admin']);    
    Route::resource('/cmspage/{page}','CmsPageController',['as' => 'admin.cmspage']);
});
