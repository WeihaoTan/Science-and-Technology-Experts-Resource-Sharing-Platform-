<?php
/**
 * Created by PhpStorm.
 * User: Tan
 * Date: 2018/6/11
 * Time: 22:46
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authentication extends Model
{
    protected $table = 'authentication_examing';
    public $timestamps = false;

    public function showAuthenticationList($admin_id){
        return $this->all();
    }

    public function showAuthentication($auth_id){
        return $this->where('auth_id', $auth_id)->get();
    }

    public function reviewAuthentication($auth_id){
        return $this->where('auth_id', $auth_id)->get();
        //不知道专家交上来了什么，待实现
    }

}