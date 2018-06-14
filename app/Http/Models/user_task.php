<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/8
 * Time: 17:24
 */
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
class user_task extends Model
{
    public $timestamps=false;
    protected $table='user_task';

    /**
     * 返回指定用户的任务列表
     * @param $id
     * @return mixed
     */
    public function listTaskbyUser($id)
    {
        return $this::where(['user_id'=>$id])->get();
    }
}