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

Route::get('/test/pay','TestController@alipay');  // 去支付

Route::get('/test/alipay/return','Alipay\PayController@aliReturn');
Route::post('/test/alipay/notify','Alipay\PayController@notify');

Route::get('/test/ascii','TestController@ascii');
Route::get('/test/dec','TestController@dec');
Route::get('/test/md1','TestController@md1');

Route::get('/api/test','Api\TestController@test');
Route::post('/api/user/reg','Api\TestController@reg');
