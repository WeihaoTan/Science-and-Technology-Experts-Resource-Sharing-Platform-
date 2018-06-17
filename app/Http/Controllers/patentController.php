<?php
/**
 * Created by PhpStorm.
 * User: iamfitz
 * Date: 2018/6/9
 * Time: 10:02
 */

namespace App\Http\Controllers;


use App\Http\Models\patent;
use Illuminate\Http\Request;

class patentController extends Controller
{
    protected $patentModel;
    public function __construct(){
        $this->patentModel = new patent();
    }

    //专利标题 获取专利列表
    public function getPatentList(Request $request){
        return response()->json(['status'=>1,
                                 'msg'=>'success',
                                 'data'=>$this->patentModel
                                              ->patentList($request->input('title'))
                                              ->toArray()
        ]);
    }
    //获取某一个专利的所有信息
    public function getPatentInfo(Request $request){
        return response()->json(['status'=>1,
                                 'msg'=>'success',
                                 'data'=>$this->patentModel
                                              ->patentInfo($request->input('patent_id'))
                                              ->toArray()
        ]);
    }
}