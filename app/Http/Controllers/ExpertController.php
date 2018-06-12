<?php
/**
 * Created by PhpStorm.
 * User: Tan
 * Date: 2018/6/8
 * Time: 17:32
 */

namespace App\Http\Controllers;

use App\Expert;
use App\Paper;
use App\PaperApply;
use App\Patent;
use App\User;
use Illuminate\Http\Request;

class ExpertController extends Controller{

    //专家查看个人信息
    public function showInfo(Request $request){
        $expert_id = $request->input('expert_id');
        $expert = new Expert();
        return $expert->showInfo($expert_id);
    }

    //专家修改个人信息
    public function modInfo(Request $request){
        $expert_id = $request->input('expert_id');
        $institution = $request->input('institution');
        $title = $request->input('title');
        $educational_experience = $request->input('educational_experience');
        $occupational_experience = $request->input('occupational_experience');
        $award_winning_experience = $request->input('award_winning_experience');
        $field = $request->input('field');
        $expert_name = $request->input('expert_name');
        $expert = new Expert();
        return $expert->modInfo($expert_id, $institution, $title, $educational_experience,
            $occupational_experience, $award_winning_experience, $field, $expert_name);
    }

    //专家查看申请信息
    public function showPaperApply(Request $request){
        $expert_id = $request->input('expert_id');
        $paperApply = new PaperApply();
        return $paperApply->expertShow($expert_id);
    }

    //专家处理申请信息
    public function dealPaperApply(Request $request){
        $paper_apply_id = $request->input('paper_apply_id');
        $status = $request->input('status');
        $expert_response = $request->input('expert_response');

        $paperApply = new PaperApply();
        return $paperApply->expertDeal($paper_apply_id, $status, $expert_response);
    }

    //专家查看个人论文
    public function showPaper(Request $request){
        $expert_id = $request->input('expert_id');
        $paper = new Paper();
        return $paper->expertShow($expert_id);
    }

    //专家查看个人专利
    public function showPatent(Request $request){
        $expert_id = $request->input('expert_id');
        $patent = new Patent();
        return $patent->expertShow($expert_id);
    }

    //专家修改个人专利
    public function modPatent(Request $request){
        $patent_id = $request->input('patent_id');
        $title = $request->input('title');
        $information = $request->input('information');
        $patent = new Patent();
        return $patent->expertMod($patent_id, $title, $information);
    }

    //专家添加个人专利
    public function addPatent(Request $request){
        $expert_id = $request->input('expert_id');
        $title = $request->input('title');
        $information = $request->input('information');
        $patent = new Patent();
        return $patent->expertAdd($expert_id, $title, $information);
    }

    //专家删除个人专利
    public function deletePatent(Request $request){
        $patent_id = $request->input('patent_id');
        $patent = new Patent();
        return $patent->expertDelete($patent_id);
    }

}