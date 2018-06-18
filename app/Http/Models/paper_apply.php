<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/8
 * Time: 23:17
 */
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
class paper_apply extends Model
{
    protected $table='paper_apply';
    public $timestamps=false;

    /**
     * 查询申请历史，包括论文详细信息和作者
     * @param $id
     * @return mixed
     */
    public function getHistorybyUser($id)
    {
        $info=$this::join('paper','paper_apply.paper_id','=','paper.paper_id')
                    ->join('expert','expert.expert_id','=','paper.first_author_id')
                    ->where('paper_apply.user_id',$id)->orderBy('request_time','desc')->get();
        #echo $info;
        return $info;
        #return $this::where('user_id',$id)->orderBy('request_time','desc')->get();
    }

    public function belongsToPaper()
    {
        return $this->belongsTo(paper::class,'paper_id','paper_id');
    }
}