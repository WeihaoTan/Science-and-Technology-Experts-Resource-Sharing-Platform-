<?php
/**
 * Created by PhpStorm.
 * User: Tan
 * Date: 2018/6/11
 * Time: 23:01
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
    public $timestamps = false;

    public function showFeedbackList($admin_id){

        $result = $this->join('user', 'feedback.user_id', '=', 'user.user_id')
            ->latest('feedback.submit_time')
            ->select('user.name', 'user.profile_picture', 'feedback_id', 'feedback.submit_time', 'feedback.topic', 'feedback.info')
            ->get();
        return $result;
    }

    public function showFeedback($feedback_id){
        return $this->where('feedback_id', $feedback_id)
            ->join('user', 'feedback.user_id', '=', 'user.user_id')
            ->select('user.name', 'user.profile_picture', 'feedback.submit_time', 'feedback.topic', 'feedback.info')
            ->get();
    }
}