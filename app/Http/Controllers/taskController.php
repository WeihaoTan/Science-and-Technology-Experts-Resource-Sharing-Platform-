<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/8
 * Time: 15:59
 */
namespace App\Http\Controllers;
use App\Http\Models;
class taskController extends Controller
{
    public $task;

    function __construct()
    {
        $task=new Models\task();
    }

    /**
     * 获取任务列表
     */
    public function listTask()
    {
        ;
    }
}