<?php
/**
 * Created by PhpStorm.
 * User: iamfitz
 * Date: 2018/6/7
 * Time: 21:43
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class patent extends Model
{
    protected $table = "patent";
    protected $primaryKey = "patent_id";

    public function patentList(string $title){
        return $this::where('title','LIKE','%'+$title+'%')->paginate(20);
    }
    public function patentInfo(int $id){
        return $this::where('patent_id',$id)->get();
    }
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

    public function showRecommendPatent()
    {
        return $this->where('patent_id', '<', '20')->get();
    }
}
