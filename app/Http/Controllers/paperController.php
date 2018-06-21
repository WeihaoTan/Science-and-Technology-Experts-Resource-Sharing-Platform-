<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: iamfitz
 * Date: 2018/6/8
 * Time: 18:03
 */

namespace App\Http\Controllers;


use App\Http\Models\paper;
use Illuminate\Http\Request;

class paperController extends Controller
{   protected $paperModel;
    protected $requestData;
    public function __construct(){
        $this->paperModel = new paper();
        $this->requestData = [];
    }

    ///论文列表
    /// 关键词、题名
    /// 发表时间
    public function getPaperList(Request $request){
        $this->requestData += array('paper_name'=>$request->input('paper_name','%'));
        return response()->json([
            'status'=>1,
            'msg'=>'success',
            'data'=>$this->paperModel
                         ->paperList($this->requestData)]);
    }

    ////某篇论文的所有信息
    public function getPaperInfo(Request $request){
        return response()->json([
            'status'=>1,
            'msg'=>'success',
            'data'=>$this->paperModel
                         ->paperInfo($request->input('paper_id'))]);
    }
    /**
     * 获取论文下载地址
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function download(Request $request)
    {
        return response()->json(['status'=>1,'msg'=>'success','data'=>$this->paperModel->download($request['paper_id'])]);
    }
    public function advancedSearch(Request $request){
        $keywords = [];
        $keywords += array('keyword1'=>$request->input('keyword1','%'));
        $keywords +=array('keyword2'=>$request->input('keyword2','%'));
        $keywords +=array('keyword3'=>$request->input('keyword3','%'));
        $keywords += array('paper_keywords'=>$request->input('paper_keywords','%'));
        $keywords += array('paper_name'=>$request->input('paper_name','%'));

        //时间范围
        $keywords += array('start_time'=>$request
            ->input('start_time','1970-1-1'));
        $keywords += array('end_time'=>$request
            ->input('end_time',date('Y-m-d',time())));

        return response()->json([
            'status'=>1,
            'msg'=>'success',
            'data'=>$this->paperModel
                ->advancedPaperList($keywords)]);
    }
}
