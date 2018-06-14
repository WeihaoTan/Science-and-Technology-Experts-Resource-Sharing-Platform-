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
Route::post('modProfile','userController@modProfile');

/**
 * 舍弃或者重定向的路由：
 * /history/request/submit -> /applyFull
 *
 */

#任务系统
Route::any('/task', 'user_taskController@getTaskbyUser');
Route::any('/task/receiveCredit', 'userController@reveiveCredit');
Route::any('/history/browsing', 'historyController@getHistorybyUser');
Route::any('/history/browsing/submit', 'historyController@setHistorybyUser');
Route::any('/history/request', 'historyController@getApplybyUser');

#查看用户收藏夹
Route::any('/collection', 'collectionController@viewFolder');
#查看收藏的专家
Route::any('/collection/expert', 'collectionController@viewExpert');
#查看收藏的论文
Route::any('/collection/paper', 'collectionController@viewPaper');
#新建收藏夹
Route::any('/collection/dir/new', 'collectionController@newFolder');
#删除收藏夹
Route::any('/collection/dir/del', 'collectionController@delFolder');
#重命名收藏夹
Route::any('/collection/dir/rename', 'collectionController@renameFolder');

#收藏
#新建
Route::any('/collection/item/new', 'collectionController@newItem');
#删除
Route::any('/collection/item/del', 'collectionController@delItem');
#重命名
Route::any('/collection/item/rename', 'collectionController@renameItem');
#移动
Route::any('/collection/item/move', 'collectionController@moveItem');
#下载
Route::any('/download', 'paperController@download');

# 201 提交认证信息
Route::any('/user/authentication', 'authExamingController@addAuthentication');
# 401 登录
Route::any('/user/login', 'userController@login');
//注意：form代码里应该包含csrf令牌 {{ csrf_field() }}
# 注册
Route::any('/user/signup', 'userController@signup');