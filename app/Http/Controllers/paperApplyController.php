<?php
/**
 * Created by PhpStorm.
 * User: iamfitz
 * Date: 2018/6/9
 * Time: 10:37
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Models;

class paperApplyController extends Controller
{
    protected $paperApplyModel;
    public function __construct(){
        $this->paperApplyModel = new Models\paperApply();
    }

    public function applyFull(Request $request){
        $this->paperApplyModel
             ->paperApplyInsert($request->all());
        return response()->json(['status'=>1,'msg'=>'success']);
    }
}