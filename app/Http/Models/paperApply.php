<?php
/**
 * Created by PhpStorm.
 * User: iamfitz
 * Date: 2018/6/9
 * Time: 10:39
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class paperApply extends Model
{
    protected $table = 'paper_apply';
    protected $primaryKey = 'paper_apply_id'; //主键
    public $timestamps = false;
    protected $guarded = array('paper_apply_id'); //paper_apply_id为自增字段
    public function paperApplyInsert(array $request){
        $applyRecord = $request;
        $applyRecord += array('request_time'=>date('Y-m-d H:i:s', time()));
        $this::create($applyRecord);
    }
}