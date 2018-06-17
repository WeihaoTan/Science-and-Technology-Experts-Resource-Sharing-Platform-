<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/12
 * Time: 11:13
 */
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
class folder extends Model
{
    protected $table='folder';
    public $timestamps=false;

    /**
     *查看用户所有收藏夹
     * @param $id
     * @param null $title
     * @return mixed
     */
    public function viewbyUser($id)
    {
        return $this::whereRaw('user_id = ?',[$id])->get();
    }

    /**
     * 根据用户id和title获得该文件夹的id
     * @param $userID
     * @param $title
     * @return mixed
     */
    public function getFolderIDbyTitle($userID,$title)
    {
        $folder_id=$this::select('folder_id')->whereRaw('user_id = ? and title = ?',[$userID,$title])->get()[0]['folder_id'];
        //echo $folder_id;
        //var_dump($folder_id);
        return $folder_id;
    }

    /**
     * 新建收藏夹，同一用户不得有同名收藏夹
     * @param $userID
     * @param $title
     * @return mixed
     */
    public function newFolder($userID, $title)
    {
        $cnt=$this::whereRaw('user_id=? and title=?',[$userID,$title])->count();
        if($cnt!=0)
            return false;
        $status=$this::insert(['user_id'=>$userID,'title'=>$title]);
        return $status;
    }

    /**
     * 删除收藏夹
     * @param $userID
     * @param $title
     * @return mixed
     */
    public function delFolder($userID,$title)
    {
        return $this::whereRaw('user_id = ? and title = ?',[$userID,$title])->delete();
    }

    /**
     * 重命名收藏夹
     * @param $userID
     * @param $old
     * @param $new
     * @return mixed
     */
    public function renameFolder($userID,$old,$new)
    {
        return $this::whereRaw('user_id = ? and title = ?',[$userID,$old])->update(['title'=>$new]);
    }
}