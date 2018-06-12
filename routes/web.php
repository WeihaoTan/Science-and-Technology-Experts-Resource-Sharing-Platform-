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

Route::get('testData', function () {

    return view('testData');
});

//（专家）查看申请信息
Route::get('expert/showApplyMessage', 'ExpertController@showPaperApply');

//（专家）处理申请信息
Route::post('expert/dealApplyMessage', 'ExpertController@dealPaperApply');

//（专家）查看个人信息
Route::get('expert/showInfo', 'ExpertController@showInfo');

//（专家）修改个人信息
Route::post('expert/modInfo', 'ExpertController@modInfo');

//（专家）查看拥有的论文
Route::get('expert/showPaper', 'ExpertController@showPaper');


//（专家）查看拥有的专利
Route::get('expert/showPatent', 'ExpertController@showPatent');

//（专家）修改拥有的专利
Route::post('expert/modPatent', 'ExpertController@modPatent');

//（专家）添加拥有的专利
Route::post('expert/addPatent', 'ExpertController@addPatent');

//（管理员）查看认证列表
Route::get('admin/showAuthentication', 'AdminController@showAuthenticationList');

//（管理员）查看认证
Route::get('admin/showAuthentication', 'AdminController@showAuthentication');

//（管理员）审核认证
Route::post('admin/reviewAuthentication', 'AdminController@reviewAuthentication');

//（管理员）屏蔽用户账号（暂时未实现）
//Route::post('expert/banUser', 'AdminController@banUser');

//（管理员）查看反馈列表
Route::get('admin/showFeedbackList', 'AdminController@showFeedbackList');

//（管理员）查看反馈详情
Route::get('admin/showFeedback', 'AdminController@showFeedback');
