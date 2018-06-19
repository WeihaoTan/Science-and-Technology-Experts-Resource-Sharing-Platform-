<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: iamfitz
 * Date: 2018/6/10
 * Time: 16:28
 */

namespace App\Http\Controllers;


use App\Http\Models\folder;
use App\Http\Models\user;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class userController extends Controller
{
    protected $userModel;
    protected $folder;
    public function __construct(){
        $this->userModel = new user();
        $this->folder=new folder();
    }
    public function getProfile(Request $request){
        return response()->json([
            'status'=>1,
            'msg'=>'success',
            'data'=>$this->userModel
                         ->profile($request->input('user_id'))
        ]);
    }
    public function modProfile(Request $request)
    {
        $this->userModel->updateProfile($request->all());
        return response()->json([
            'status' => 1,
            'msg' => 'success',
        ]);
    }
    /**
     * 为指定用户增加积分
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reveiveCredit(Request $request)
    {
        return response()->json(['status'=>1,'msg'=>'success','data'=>$this->userModel->incrementCreditbyUser($request['user_id'],$request['credit'])]);
    }

    /**
     * 登录
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public  function login(Request $request)
    {
        $ret=(int)($this->userModel->login($request['name'],$request['passwd']));
        if($ret != -1)
        {
            session(['user'=>$request['name']]);
            //echo $ret;
        }
        return response()->json(['data'=>$ret]);
    }

    public function logout(Request $request)
    {
        session(['user'=>null]);
    }

    /**
     * 注册
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function  signup(Request $request)
    {
        $user_id=(int)($this->userModel->signup($request['name'],$request['mail'],$request['passwd']));
        #echo $user_id;
        if($user_id != -1)
        {
            $this->folder->newFolder($user_id,'expert');
            $this->folder->newFolder($user_id,'paper');
			$this->folder->newFolder($user_id,'patent');
        }
        return response()->json(['data'=>$user_id]);
    }
}