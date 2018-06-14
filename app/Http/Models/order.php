<?php
/**
 * Created by PhpStorm.
 * User: iamfitz
 * Date: 2018/6/7
 * Time: 21:50
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = "order";
    protected $primaryKey = "order_id";
    protected $guarded = array('order_id');
    public $timestamps = false;
    public function consumeHistoryList(int $id){
        return $this::where('user_id',$id)->where('amount','<',0)->get();
    }

    public function orderInsert(array $request){
        $request += array('time'=>date('Y-m-d H:i:s', time()));
        $this::create($request);
    }

    public function purchaseHistoryList(int $id){
        return $this::where('user_id',$id)->where('amount','>',0)->get();
    }
}