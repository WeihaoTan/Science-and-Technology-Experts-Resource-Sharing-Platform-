<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
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
    public $timestamps=false;
    public function paperList(array $request){
        return $this::where('paper_keywords','like','%'.$request['paper_keywords'].'%')
                    ->where('paper_name','like','%'.$request['paper_name'].'%')
                    ->whereBetween('publish_time',[$request['start_time'],$request['end_time']])
                    ->join('expert', 'expert.expert_id', '=', 'paper.first_author_id')
                    ->select('paper_id','access','paper_name','expert_name',
                        'first_author_id','publish_time','abstract','url','paper_keywords','type')
                    ->get();
    }
    ////某篇论文所有信息
    public function paperInfo(int $id)
    {
        return $this::where('paper_id', $id)
        ->join('expert', 'expert.expert_id', '=', 'paper.first_author_id')
        ->select('paper_id','access','paper_name','expert_name',
                 'first_author_id','publish_time','abstract','url','paper_keywords','type')
        ->get();

    }
    /**
     * 获取论文下载地址
     * @param $paper_id
     * @return mixed
     */
    public function download($paper_id)
    {
        return $this::whereRaw('paper_id = ?',[$paper_id])->get()[0]['url'];
    }
    public function expertShow($expert_id){
        return $this->where('first_author_id', $expert_id)->get();
    }

    public function hasManyApplies()
    {
        return $this->hasMany(paper_apply::class, 'paper_id', 'paper_id');
    }

    public function showRecommendPaper()
    {
        return $this->where('paper_id', '<', '20')->get();
    }

}
