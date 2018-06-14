<?php
/**
 * Created by PhpStorm.
 * User: Tan
 * Date: 2018/6/8
 * Time: 18:07
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperApply extends Model
{
    protected $table = 'paper_apply';
    protected $primaryKey ='paper_apply_id';
    public $timestamps = false;

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