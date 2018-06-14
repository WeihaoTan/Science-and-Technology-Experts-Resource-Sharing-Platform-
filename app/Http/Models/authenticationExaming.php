<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/11
 * Time: 22:52
 */
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
class authenticationExaming extends Model
{
    protected $table='authentication_examing';
    public $timestamps=false;

    /**
     * 用户申请认证专家
     * @param array $info
     * @return mixed
     */
    public function addAuthExaming($userID,$info)
    {
        $status=$this::insert(['user_id'=>$userID,'auth_info'=>$info]);
        return $status;
    }
}