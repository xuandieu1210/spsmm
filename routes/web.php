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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('donvi/getData', 'DonviController@getData')->name('donvi.getData');
Route::resource('/donvi', 'DonViController');

Route::get('daivt/getData', 'DaivtController@getData')->name('daivt.getData');
Route::resource('/daivt', 'DaivtController');

Route::get('nhanvien/getData', 'NhanvienController@getData')->name('nhanvien.getData');
Route::get('nhanvien/search', 'NhanvienController@search')->name('nhanvien.search');
Route::resource('/nhanvien', 'NhanvienController');

Route::get('nhompi/getData', 'NhompiController@getData')->name('nhompi.getData');
Route::resource('/nhompi', 'NhompiController');

Route::get('module/getData', 'ModuleController@getData')->name('module.getData');
Route::resource('/module', 'ModuleController');

Route::get('adcsnsr/getData', 'AdcsnsrController@getData')->name('adcsnsr.getData');
Route::resource('/adcsnsr', 'AdcsnsrController');

Route::get('output/getData', 'OutputController@getData')->name('output.getData');
Route::resource('/output', 'OutputController');

Route::get('alarm/getData', 'AlarmController@getData')->name('alarm.getData');
Route::resource('/alarm', 'AlarmController');

Route::get('param/getData', 'ParamController@getData')->name('param.getData');
Route::post('param/getDetail', 'ParamController@getByPiId')->name('param.getByPiId');
Route::post('param/updateAjax', 'ParamController@updateAjax')->name('param.updateAjax');
Route::resource('/param', 'ParamController');

Route::get('pi/getData', 'PiController@getData')->name('pi.getData');
Route::post('pi/ping', 'PiController@ping')->name('pi.ping');
Route::post('pi/resetParam', 'PiController@resetParam')->name('pi.resetParam');
Route::post('pi/active', 'PiController@active')->name('pi.active');
Route::resource('/pi', 'PiController');

Route::get('logsnsr/getData', 'LogsnsrController@getData')->name('logsnsr.getData');
Route::get('logsnsr/deleteMulti', 'LogsnsrController@deleteMulti')->name('logsnsr.deleteMulti');
Route::resource('/logsnsr', 'LogsnsrController');

Route::get('logsnsr1/getData', 'LogsnsrController@getData')->name('logsnsr1.getData');
Route::get('logsnsr1/deleteMulti', 'LogsnsrController@deleteMulti')->name('logsnsr1.deleteMulti');
Route::resource('/logsnsr1', 'LogsnsrController');


Route::get('logalarm16/getData', 'Logalarm16Controller@getData')->name('logalarm16.getData');
Route::get('logalarm16/deleteMulti', 'Logalarm16Controller@deleteMulti')->name('logalarm16.deleteMulti');
Route::resource('/logalarm16', 'Logalarm16Controller');

Route::get('logctrl/getData', 'LogctrlController@getData')->name('logctrl.getData');
Route::get('logctrl/deleteMulti', 'LogctrlController@deleteMulti')->name('logctrl.deleteMulti');
Route::resource('/logctrl', 'LogctrlController');

Route::get('logalarm/getData', 'LogalarmController@getData')->name('logalarm.getData');
Route::get('logalarm/deleteMulti', 'LogalarmController@deleteMulti')->name('logalarm.deleteMulti');
Route::post('logalarm/actionShowlog', 'LogalarmController@actionShowlog')->name('logalarm.actionShowlog');
Route::resource('/logalarm', 'LogalarmController');