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
    public function expertShow($expert_id){
        $result = $this->join('user', 'paper_apply.user_id', '=', 'user.user_id')
            ->orderBy('status', 'asc')
            ->latest('request_time')
            ->join('paper', 'paper_apply.paper_id', '=', 'paper.paper_id')
            ->where('paper.first_author_id', '=', $expert_id)
            ->select('user.name', 'user.profile_picture', 'paper.paper_name', 'paper_apply.info', 'paper_apply.request_time', 'paper_apply.status','paper_apply.expert_response')
            ->get();
        return $result;
    }

    public function expertDeal($paper_apply_id, $status, $expert_response){
        return $this->where('paper_apply_id', $paper_apply_id)
            ->update(['status' => $status, 'expert_response' => $expert_response]);
        //若成功还应该将论文加入用户的收藏夹，暂未实现，同时专家还可以上传论文
    }

}