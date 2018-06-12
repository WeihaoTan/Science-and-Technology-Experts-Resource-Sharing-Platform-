<?php
/**
 * Created by PhpStorm.
 * User: iamfitz
 * Date: 2018/6/10
 * Time: 16:28
 */

namespace App\Http\Controllers;


use App\Http\Models\user;
use function foo\func;
use Illuminate\Http\Request;

class userController extends Controller
{
    protected $userModel;
    public function __construct(){
        $this->userModel = new user();

    }
    public function getProfile(Request $request){
        return response()->json([
            'status'=>1,
            'msg'=>'success',
            'data'=>$this->userModel
                         ->profile($request->input('user_id'))
        ]);
    }
    public function modProfile(Request $request){
        $this->userModel->updateProfile($request->all());
        return response()->json([
            'status'=>1,
            'msg'=>'success',
        ]);
    }
}