<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/8
 * Time: 22:08
 */
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
class browsing_record extends Model
{
    public $timestamps=false;
    protected $table='browsing_record';

    /**
     * 获取指定用户的浏览历史，时间倒序
     * @param $id
     * @return mixed
     */
    public function getHistorybyUser($id)
    {
        return $this::where('user_id',$id)->orderBy('time','desc')->get();
    }

    /**
     * 增加浏览记录，有则修改，无则增加
     * @param $id
     * @param $url
     * @return mixed
     */
    public function setHistorybyUser($id,$url)
    {
        $count=$this::where(['user_id'=>$id,'url'=>$url])->count();
        if ($count!=0)
        {
            $this::where(['user_id'=>$id,'url'=>$url])->update(['time'=>date("Y-m-d H:i:s")]);
        }
        else
        {
            $this::insert(['user_id'=>$id,'url'=>$url,'time'=>date("Y-m-d H:i:s")]);
        }
        return $this->getHistorybyUser($id);
    }
}


