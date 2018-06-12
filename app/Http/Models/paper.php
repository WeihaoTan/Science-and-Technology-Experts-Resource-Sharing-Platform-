<?php
/**
 * Created by PhpStorm.
 * User: iamfitz
 * Date: 2018/6/7
 * Time: 21:42
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class paper extends Model
{
    protected $table = "paper";
    protected $primaryKey = "paper_id";

    ////论文列表
    public function paperList(array $request){
        return $this::where('paper_keywords','like','%'.$request['paper_keywords'].'%')
                    ->where('paper_name','like','%'.$request['paper_name'].'%')
                    ->whereBetween('publish_time',[$request['start_time'],$request['end_time']])
                    ->get();
    }
    ////某篇论文所有信息
    public function paperInfo(int $id){
        return $this::where('paper_id',$id)->get();
    }
}