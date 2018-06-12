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
        return $this::where('title',$title)->get();
    }
    public function patentInfo(int $id){
        return $this::where('patent_id',$id)->get();
    }
}