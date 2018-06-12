<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/12
 * Time: 11:12
 */
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
class collection extends Model
{
    protected $table='collection';
    public $timestamps=false;

    /**
     * 查看folder_id收藏夹的所有收藏
     * @param $user_id
     * @param $folder_id
     * @return mixed
     */
    public function viewCollectionsbyFolder($user_id, $folder_id)
    {
            return $this::whereRaw('user_id = ? and parent = ?',[$user_id,$folder_id])->get();
    }

    /**
     * 新建收藏
     * @param $user_id
     * @param $url
     * @param $title
     * @param $parent
     * @return mixed
     */
    public function newItem($user_id,$url,$title,$parent)
    {
        return $this::insert(['user_id'=>$user_id,'url'=>$url,'title'=>$title,'parent'=>$parent]);
    }

    /**
     * 删除收藏
     * @param $user_id
     * @param $item_id
     * @return mixed
     */
    public function delItem($user_id,$item_id)
    {
        return $this::whereRaw('user_id = ? and collection_id = ?',[$user_id,$item_id])->delete();
    }

    /**
     * 重命名收藏
     * @param $user_id
     * @param $item_id
     * @param $new
     * @return mixed
     */
    public function renameItem($user_id,$item_id,$new)
    {
        return $this::whereRaw('user_id = ? and collection_id = ?',[$user_id,$item_id])->update(['title'=>$new]);
    }

    /**
     * 移动收藏
     * @param $user_id
     * @param $item_id
     * @param $parent
     * @return mixed
     */
    public function moveItem($user_id,$item_id,$parent)
    {
        return $this::whereRaw('user_id = ? and collection_id = ?',[$user_id,$item_id])->update(['parent'=>$parent]);
    }
}