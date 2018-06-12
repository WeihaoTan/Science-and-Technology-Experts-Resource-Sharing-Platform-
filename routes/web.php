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

//专家相关
//获得专家列表
Route::get('expertList','expertController@getExpertList');
//获得某个专家的所有信息
Route::get('expertInfo','expertController@getExpertInfo');

//论文
//获得论文列表
Route::get('paperList','paperController@getPaperList');
//获得某篇论文的所有信息
Route::get('paperInfo','paperController@getPaperInfo');

//专利
//获得专利列表
Route::get('patentList','patentController@getPatentList');
//获得某个专利的所有信息
Route::get('patentInfo','patentController@getpatentInfo');

//申请论文全文
Route::post('applyFull','paperApplyController@applyFull');

//反馈
//提交反馈
Route::post('submitFeedback','feedbackController@submitFeedback');

//积分
//积分历史消费情况
Route::get('integralUseHistory','integralController@getConsumeHistoryList');
//购买积分
Route::post('buyIntegral','integralController@buyIntegral');
//购买历史记录
Route::get('purchaseHistory','orderController@getPurchaseHistoryList');

//个人资料
//查看个人资料
Route::get('profile','userController@getProfile');
Route::any('modProfile','userController@modProfile');