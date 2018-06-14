<?php
/**
 * Created by PhpStorm.
 * User: Tan
 * Date: 2018/6/11
 * Time: 16:33
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Patent extends Model
{
    protected $table = 'patent';
    public $timestamps = false;

    public function expertShow($expert_id){
        return $this->where('expert_id', $expert_id)->get();
    }

    public function expertMod($patent_id, $title, $information){
        return $this->where('patent_id', $patent_id)
            ->update(['title' => $title, 'information' => $information]);
    }

    public function expertAdd($expert_id, $title, $information){
        return $this->insertGetId(['expert_id' => $expert_id, 'title' => $title, 'information' => $information]);
    }

    public function expertDelete($patent_id){
        return $this->where('patent_id', $patent_id)->delete();
    }
}