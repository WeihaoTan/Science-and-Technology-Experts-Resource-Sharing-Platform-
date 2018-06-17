<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/12
 * Time: 15:54
 */
namespace App\Http\Controllers;
use App\Http\Models;
use App\Http\Controllers;
use Illuminate\Http\Request;
class collectionController extends Controller
{
    protected $collection;
    protected $folder;
    function __construct()
    {
        $this->collection=new Models\collection();
        $this->folder=new Models\folder();
    }

    /**
     * 查看所有收藏夹
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewFolder(Request $request)
    {
        return response()->json(['status'=>1,'msg'=>'success','data'=>$this->folder->viewbyUser($request['user_id'])->toArray()]);
    }

    /**
     * 查看收藏的专家
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewExpert(Request $request)
    {
        $userid=$request['user_id'];
        $title='expert';
        $folder_id=$this->folder->getFolderIDbyTitle($userid,$title);
        return response()->json(['status'=>1,'msg'=>'success','data'=>$this->collection->viewCollectionsbyFolder($userid,$folder_id)->toArray()]);
    }

    /**
     * 查看论文收藏夹
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewPaper(Request $request)
    {
        $userid=$request['user_id'];
        $title='paper';
        $folder_id=$this->folder->getFolderIDbyTitle($userid,$title);
        return response()->json(['status'=>1,'msg'=>'success','data'=>$this->collection->viewCollectionsbyFolder($userid,$folder_id)->toArray()]);
    }

    /**
     * 查看其他收藏夹
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewOther(Request $request)
    {
        return response()->json(['status'=>1,'msg'=>'success','data'=>$this->collection->viewCollectionsbyFolder($request['user_id'],$request['folder_id'])->toArray()]);
    }

    /**
     * 新建收藏夹
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function newFolder(Request $request)
    {
        return response()->json(['status'=>$this->folder->newFolder($request['user_id'],$request['title'])]);
    }

    /**
     * 删除收藏夹
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delFolder(Request $request)
    {
        return response()->json(['status'=>$this->folder->delFolder($request['user_id'],$request['title'])]);
    }

    /**
     * 重命名收藏夹
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function renameFolder(Request $request)
    {
        return response()->json(['status'=>$this->folder->renameFolder($request['user_id'],$request['old'],$request['new'])]);
    }

    /**
     * 新建收藏
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function newItem(Request $request)
    {
        return response()->json(['status'=>$this->collection->newItem($request['user_id'],$request['url'],$request['title'],$request['parent'])]);
    }

    /**删除收藏
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delItem(Request $request)
    {
        return response()->json(['status'=>$this->collection->delItem($request['user_id'],$request['item_id'])]);
    }

    /**
     * 重命名收藏
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function renameItem(Request $request)
    {
        return response()->json(['status'=>$this->collection->renameItem($request['user_id'],$request['item_id'],$request['new'])]);
    }

    /**
     * 移动收藏
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function moveItem(Request $request)
    {
        return response()->json(['status'=>$this->collection->moveItem($request['user_id'],$request['item_id'],$request['parent'])]);
    }

}