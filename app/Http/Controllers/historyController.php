<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/8
 * Time: 22:16
 */
namespace App\Http\Controllers;
use App\Http\Models;
use App\Http\Controllers;
use Illuminate\Http\Request;
class historyController extends Controller
{
    protected $browsing;
    protected $apply;
    function __construct()
    {
        $this->browsing=new Models\browsing_record();
        $this->apply=new Models\paper_apply();
    }

    /**
     * 返回指定用户的浏览历史，时间倒序
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getHistorybyUser(Request $request)
    {
        return response()->json(['status'=>1,'msg'=>'success','data'=>$this->browsing->getHistorybyUser($request['user_id'])->toArray()]);
    }

    /**
     * 添加浏览历史
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setHistorybyUser(Request $request)
    {
        return response()->json(['status'=>1,'msg'=>'success','data'=>$this->browsing->setHistorybyUser($request['user_id'],$request['url'])->toArray()]);
    }

    /**
     * 申请历史
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getApplybyUser(Request $request)
    {
        return response()->json(['status'=>1,'msg'=>'success','data'=>$this->apply->getHistorybyUser($request['user_id'])->toArray()]);
    }

}