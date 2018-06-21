<?php
/**
 * Created by PhpStorm.
 * User: iamfitz
 * Date: 2018/6/7
 * Time: 21:39
 * 专家数据模型
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;


class expert extends Model
{
    protected $table = "expert";
    //protected $primaryKey = "expert_id";

    ////通过专家名称获取
    public function expertList(string $expertName){
        return $this::where('expert_name','LIKE',$expertName)->paginate(10);
    }
    ////取得某个专家的信息
    public function expertInfo(int $id){
        $paperList = collect(['papers'=>$this::find($id)->papers]); //论文
        $patentList = collect(['patents'=>$this::find($id)->patents]); //专利
        $res = $this::where('expert_id',$id)->get(); //基本信息
        $res = $paperList->merge($patentList)->merge($res); //整合
        return $res;
    }
    public function papers(){
        return $this->hasMany('App\Http\Models\paper','first_author_id','expert_id');
    }
    public function patents(){
        return $this->hasMany('App\Http\Models\patent','expert_id','expert_id');
    }
    public function showInfo($expert_id){
        return $this->where('expert_id', $expert_id)->get();
    }
    public function modInfo($expert_id, $institution, $title, $occupational_experience, $award_winning_experience, $field, $expert_name){
        return $this->where('expert_id', $expert_id)
            ->update(['institution' => $institution, 'title' => $title,
               'occupational_experience' => $occupational_experience, 'award_winning_experience' => $award_winning_experience,
                'field' => $field, 'expert_name' => $expert_name]);
            //->update(['title' => $title]);
}

    public function reviewAuthentication($user_id, $expert_id, $status)
    {
        if ($status == 1)
        {
            return $this->where('expert_id', $expert_id)
                //->value('user_id');
                ->update(['user_id' => 2]);
                //->get();
        }
    }
    public function showRecommendExpert()
    {
        return $this->where('expert_id', '<', 20000)
            ->get();
    }
}
