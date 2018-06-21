<?php
/**
 * Created by PhpStorm.
 * User: Tan
 * Date: 2018/6/22
 * Time: 3:15
 */
namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class similarPaper extends Model
{
    protected $table = "paper_similar";
    public $timestamps = false;

    public function getSimilarPaper($paper_id){
        return $this->where('paper_id', $paper_id)->value('similar_paper');
        //return $this->where('paper_id', $paper_id)->get();
    }

}
