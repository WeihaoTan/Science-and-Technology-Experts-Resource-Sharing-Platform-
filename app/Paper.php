<?php
/**
 * Created by PhpStorm.
 * User: Tan
 * Date: 2018/6/11
 * Time: 16:30
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class  Paper extends Model
{
    protected $table = 'paper';
    public $timestamps = false;

    public function expertShow($expert_id){
        return $this->where('first_author_id', $expert_id)->get();
    }

}