<?php
/**
 * Created by PhpStorm.
 * User: iamfitz
 * Date: 2018/6/9
 * Time: 10:22
 */

namespace App\Http\Controllers;


use App\Http\Models\feedback;
use Illuminate\Http\Request;

class feedbackController extends Controller
{
    protected $feedbackModel;
    public function __construct(){
        $this->feedbackModel = new feedback();
    }

    public function submitFeedback(Request $request){
        $this->feedbackModel
             ->feedbackInsert($request->all());
        return response()->json([
            'status'=>1,
            'msg'=>'success'
        ]);
    }
}