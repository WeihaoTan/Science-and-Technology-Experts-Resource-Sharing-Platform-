<?php
/**
 * Created by PhpStorm.
 * User: iamfitz
 * Date: 2018/6/10
 * Time: 15:29
 */

namespace App\Http\Controllers;


use App\Http\Models\order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class integralController extends Controller
{
    protected $integralModel; //积分模型
    public function __construct(){
        $this->integralModel = new order();
    }
    public function getConsumeHistoryList(Request $request){
        return response()->json([
            'status'=>1,
            'msg'=>'success',
            'data'=>$this->integralModel
                         ->consumeHistoryList($request->input('user_id')
                         ->toArray())
        ]);
    }
    public function buyIntegral(Request $request){
        $this->integralModel
             ->orderInsert($request->all());
        return response()->json([
            'status'=>1,
            'msg'=>'success'
        ]);
    }
}