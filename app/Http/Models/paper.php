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
     ////论文列表
    public function paperList(array $request){
        return $this::whereRaw('MATCH(paper_name) AGAINST(? IN NATURAL LANGUAGE MODE)',$request['paperName'])
                    ->paginate(10);
    }
    ////某篇论文所有信息
    public function paperInfo(int $id)
    {   $paper_key = new paper_key();
        $paper_ref = new paper_ref();
        $paperKeywords = collect(['paper_keys'=>$paper_key::where('paper_id',$id)->get()]); //论文关键词
        $paperRefs = collect(['paper_refs'=>$paper_ref::where('paper_id',$id)->get()]);
        $info =  $this::where('paper_id', $id)
        ->join('expert', 'expert.expert_id', '=', 'paper.first_author_id')
        ->select('paper_id','access','paper_name','expert_name',
                 'first_author_id','publish_time','abstract','url','type')
        ->get();
        return $paperKeywords->merge($paperRefs)->merge($info);

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
    public function advancedPaperList(array $request){
        $paper_key = new paper_key();
        $paper_id = $paper_key->whereIn('key',[$request['keyword1'],$request['keyword2'],$request['keyword3']])->select('paper_id')->distinct()->get();
        return $this::whereIn('paper_id',$paper_id)
            ->whereRaw('MATCH(paper_name) AGAINST(? IN NATURAL LANGUAGE MODE)',$request['paper_name'])
            ->whereBetween('publish_time',[$request['start_time'],$request['end_time']])
            ->paginate(10);
    }
}
