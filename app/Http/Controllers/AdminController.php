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
use App\User;
use App\Authentication;
use Illuminate\Http\Request;

class AdminController extends Controller{
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
        $authentication = new Authentication();
        return $authentication->reviewAuthentication($auth_id);
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