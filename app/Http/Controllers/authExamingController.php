<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/11
 * Time: 22:59
 */
namespace App\Http\Controllers;
use App\Http\Models;
use App\Http\Controllers;
use Illuminate\Http\Request;
class authExamingController extends Controller
{
    protected $auth;
    function __construct()
    {
        $this->auth=new Models\authenticationExaming();
    }

    /**
     * 添加认证申请
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addAuthentication(Request $request)
    {
        return response()->json(['status'=>(int)$this->auth->addAuthExaming($request['user_id'],$request['info'])]);
    }
}