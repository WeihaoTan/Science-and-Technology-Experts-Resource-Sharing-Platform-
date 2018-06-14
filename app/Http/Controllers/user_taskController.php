<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/8
 * Time: 15:59
 */
namespace App\Http\Controllers;
use App\Http\Models;
use App\Http\Controllers;
use Illuminate\Http\Request;
class user_taskController extends Controller
{
    protected $task;
    protected $user_task;

    function __construct()
    {
        $this->task=new Models\task();
        $this->user_task=new Models\user_task();
    }

    /**
     * 获取某用户的任务列表
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTaskbyUser(Request $request)
    {
        return response()->json(['status'=>1,'msg'=>'success','data'=>$this->user_task->listTaskbyUser($request['user_id'])->toArray()]);
    }

}