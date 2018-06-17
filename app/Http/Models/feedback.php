<?php
/**
 * Created by PhpStorm.
 * User: iamfitz
 * Date: 2018/6/7
 * Time: 21:46
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class feedback extends Model
{
    protected $table = "feedback";
    protected $primaryKey = "feedback_id";
    public $timestamps = false;
    protected $guarded = array('feedback_id');
    public function feedbackInsert(array $request){
        //在feedback中插入一条记录
        $request += array('submit_time'=>date('Y-m-d H:i:s', time()));
        $this::create($request);
    }
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