<?php
/**
 * Created by PhpStorm.
 * User: iamfitz
 * Date: 2018/6/7
 * Time: 22:02
 */
namespace App\Http\Controllers;

use App\Http\Models\expert;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;


class expertController extends Controller{
    protected $expertModel;
    protected $requestData;
    public function __construct(){
        $this->expertModel = new expert();
        $this->requestData = [];
    }
    ////通过专家名称获取
    public function  getExpertList(Request $request){
        return response()->json([
            'status' => 1,
            'msg' => 'success',
            'data' => $this->expertModel
                           ->expertList($request->input('expert_name'))]);
    }

    ////某个专家的所有信息
    public function getExpertInfo(Request $request){
        return response()->json([
            'status'=>1,
            'msg'=>'success',
            'data'=>$this->expertModel
                         ->expertInfo($request->input('expert_id'))]);
    }
}