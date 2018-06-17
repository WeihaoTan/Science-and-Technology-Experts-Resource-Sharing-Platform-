<?php
/**
 * Created by PhpStorm.
 * User: Tan
 * Date: 2018/6/11
 * Time: 22:29
 */
namespace App\Http\Controllers;

use App\Expert;
use App\Feedback;
use App\Paper;
use App\PaperApply;
use App\Patent;
use App\Http\Models\user;
use App\Authentication;
use Illuminate\Http\Request;

class adminController extends Controller{
    public function showAuthentication(Request $request){
        $admin_id = $request->input('admin_id');
        $authentication = new Authentication();
        return $authentication->showAuthentication($admin_id);
    }

    public function showAuthenticationList(Request $request){
        $auth_id = $request->input('auth_id');
        $authentication = new Authentication();
        return $authentication->showAuthentication($auth_id);
    }

    public function reviewAuthentication(Request $request){
        $auth_id = $request->input('auth_id');
        $user_id = $request->input('user_id');
        $expert_id = $request->input('expert_id');
        $status = $request->input('status');
        $authentication = new Authentication();
        $authentication->reviewAuthentication($auth_id, $status);

        $user = new user();
        $user->reviewAuthentication($user_id, $status);

        $expert = new \App\Http\Models\expert();
        $expert->reviewAuthentication($user_id, $expert_id, $status);

        return 1;
    }

    public function showFeedbackList(Request $request){
        $admin_id = $request->input('admin_id');
        $feedback = new Feedback();
        return $feedback->showFeedbackList($admin_id);
    }

    public function showFeedback(Request $request){
        $feedback_id = $request->input('feedback_id');
        $feedback = new Feedback();
        return $feedback->showFeedback($feedback_id);

    }
}