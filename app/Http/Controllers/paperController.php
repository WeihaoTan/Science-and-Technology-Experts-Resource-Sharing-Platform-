<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/12
 * Time: 19:43
 */
namespace App\Http\Controllers;
use App\Http\Models;
use App\Http\Controllers;
use Illuminate\Http\Request;
class paperController extends Controller
{
    protected $paper;
    function __construct()
    {
        $this->paper=new Models\paper();
    }

    /**
     * 获取论文下载地址
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function download(Request $request)
    {
        return response()->json(['status'=>1,'msg'=>'success','data'=>$this->paper->download($request['paper_id'])]);
    }

}