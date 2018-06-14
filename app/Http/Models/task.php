<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/8
 * Time: 15:40
 */
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
class task extends Model
{
    public $timestamps=false;
    protected $table='task';
    protected $primaryKey='task_id';

}