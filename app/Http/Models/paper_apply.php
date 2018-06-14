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
     * 查询申请历史
     * @param $id
     * @return mixed
     */
    public function getHistorybyUser($id)
    {
        return $this::where('user_id',$id)->orderBy('request_time','desc')->get();
    }
}