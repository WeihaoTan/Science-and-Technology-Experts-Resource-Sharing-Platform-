<?php
/**
 * Created by PhpStorm.
 * User: iamfitz
 * Date: 2018/6/10
 * Time: 16:15
 */

namespace App\Http\Controllers;


use App\Http\Models\order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    protected $orderModel;
    public function __construct(){
        $this->orderModel = new order();
    }
    public function getPurchaseHistoryList(Request $request){
        return response()->json([
            'status'=>1,
            'msg'=>'success',
            'data'=>$this->orderModel
                         ->purchaseHistoryList($request->input('user_id')
                         ->toArray())
        ]);
    }
}