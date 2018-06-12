<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/8
 * Time: 18:24
 */
namespace App\Http\Controllers;
use App\Http\Models;
use App\Http\Controllers;
use Illuminate\Http\Request;
class userController extends Controller
{
    protected $user;
    function __construct()
    {
        $this->user=new Models\user();
    }

    /**
     * 为指定用户增加积分
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reveiveCredit(Request $request)
    {
        return response()->json(['status'=>1,'msg'=>'success','data'=>$this->user->incrementCreditbyUser($request['user_id'],$request['credit'])]);
    }

    /**
     * 登录
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public  function login(Request $request)
    {
        return response()->json(['status'=>(int)($this->user->login($request['name'],$request['passwd']))]);
    }

    public function  signup(Request $request)
    {
        return response()->json(['status'=>(int)($this->user->signup($request['name'],$request['mail'],$request['passwd']))]);
    }
}