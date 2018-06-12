<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/12
 * Time: 19:40
 */
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
class paper extends Model
{
    protected $table='paper';
    public $timestamps=false;

    /**
     * 获取论文下载地址
     * @param $paper_id
     * @return mixed
     */
    public function download($paper_id)
    {
        return $this::whereRaw('paper_id = ?',[$paper_id])->get()[0]['url'];
    }
}