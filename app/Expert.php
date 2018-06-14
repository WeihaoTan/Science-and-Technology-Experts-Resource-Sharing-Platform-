<?php
/**
 * Created by PhpStorm.
 * User: Tan
 * Date: 2018/6/8
 * Time: 17:43
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Expert extends Model
{
    protected $table = 'expert';
    public $timestamps = false;

    public function showInfo($expert_id){
        return $this->where('expert_id', $expert_id)->get();
    }

    public function modInfo($expert_id, $institution, $title, $educational_experience,
                            $occupational_experience, $award_winning_experience, $field, $expert_name){
        return $this->where('expert_id', $expert_id)
            ->update(['institution' => $institution, 'title' => $title, 'educational_experience' => $educational_experience,
                'occupational_experience' => $occupational_experience, 'award_winning_experience' => $award_winning_experience,
                'field' => $field, 'expert_name' => $expert_name]);
    }

}