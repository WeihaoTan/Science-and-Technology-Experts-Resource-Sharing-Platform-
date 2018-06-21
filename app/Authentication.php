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
        return $this->paginate(10);
    }

    public function showAuthentication($auth_id){
        return $this->where('auth_id', $auth_id)
            ->join('expert', 'authentication_examing.user_id', '=', 'expert.user_id')
            ->select('expert.expert_id', 'authentication_examing.auth_id', 'authentication_examing.user_id', 'authentication_examing.auth_info', 'authentication_examing.auth_state')
            ->paginate(10);


    }

    public function reviewAuthentication($auth_id, $status){
        if ($status == 1)
        {
            $this->where('auth_id', $auth_id)
                ->update(['auth_state' => $status]);
        }
    }

}