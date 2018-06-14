<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: iamfitz
 * Date: 2018/6/7
 * Time: 21:48
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = "user";
    protected $primaryKey = "user_id";
    protected $guarded = array('user_id','password','point');
    public $timestamps = false;
    public function profile(int $id){
        return $this::where('user_id',$id)->get();
    }
    public function updateProfile(array $request)
    {
        return $this::where('user_id', $request['user_id'])->update($request);
    }
    /**
     * 为指定用户增加积分
     * @param $id
     * @param $credit
     * @return mixed
     */
    public function incrementCreditbyUser($id,$credit)
    {
        $this::where(['user_id'=>$id])->increment('point',$credit);
        return $this::where(['user_id'=>$id])->value('point');
    }

    /**
     * 登录，检查用户名（邮箱）与密码是否匹配
     * @param $name
     * @param $passwd
     * @return bool
     */
    public function login($name,$passwd)
    {
        $count=$this::whereRaw('(account = ? and password = ?) or (mail = ? and password = ?)',[$name,$passwd,$name,$passwd])->count();
        if($count!= 0)
            return true;
        else
            return false;
    }

    /**
     * 注册，用户名与邮箱任何一个都不能冲突
     * @param $name
     * @param $mail
     * @param $passwd
     * @return bool
     */
    public function signup($name, $mail, $passwd)
    {
        $conflit=$this::whereRaw('account = ? or mail = ?',[$name, $mail])->count();
        if ($conflit != 0)
            return false;
        $status=$this::insert(['account'=>$name,'mail'=>$mail,'password'=>$passwd]);
        return $status;
    }
}