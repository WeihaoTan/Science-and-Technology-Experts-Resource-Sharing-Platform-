<?php
/**
 * Created by PhpStorm.
 * User: iamfitz
 * Date: 2018/6/7
 * Time: 21:48
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = "user";
    protected $primaryKey = "user_id";
    protected $guarded = array('user_id','password','point');
    public $timestamps = false;
    public function profile(int $id){
        return $this::where('user_id',$id)->get();
    }
    public function updateProfile(array $request){
        return $this::where('user_id',$request['user_id'])->update($request);
    }
}