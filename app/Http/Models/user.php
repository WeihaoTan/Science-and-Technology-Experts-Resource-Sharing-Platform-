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
     * 登录，检查用户名（邮箱）与密码是否匹配，返回用户ID
     * @param $name
     * @param $passwd
     * @return int
     */
    public function login($name,$passwd)
    {
        #$count=$this::whereRaw('(account = ? and password = ?) or (mail = ? and password = ?)',[$name,$passwd,$name,$passwd])->count();
        $user=$this::select('user_id')->whereRaw('(account = ? and password = ?) or (mail = ? and password = ?)',[$name,$passwd,$name,$passwd])->get();
        $count= count($user);
        if($count!= 0)
            return $user[0]['user_id'];
        else
            return -1;
    }

    public function isExpert($uid)
    {
        return (int)$this::select('is_expert')->whereRaw('user_id = ?',[$uid])->get()[0]['is_expert'];
    }

    /**
     * 注册，用户名与邮箱任何一个都不能冲突，注册成功返回用户id，失败返回-1
     * @param $name
     * @param $mail
     * @param $passwd
     * @return bool
     */
    public function signup($name, $mail, $passwd)
    {
        $conflit=$this::whereRaw('account = ? or mail = ?',[$name, $mail])->count();
        if ($conflit != 0)
            return -1;
        $this::insert(['account'=>$name,'mail'=>$mail,'password'=>$passwd]);
        $id=$this::select('user_id')->whereRaw('account = ?',[$name])->get()[0]['user_id'];
        return $id;
    }

    public function reviewAuthentication($user_id, $status)
    {
        if ($status == 1)
        {
            $this->where('user_id', $user_id)
                ->update(['is_expert' => $status]);
        }
    }



}