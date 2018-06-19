<?php
/**
 * Created by PhpStorm.
 * User: Song
 * Date: 2018/6/19
 * Time: 17:27
 */
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table='admin';
    public $timestamps=false;

    public function login($name,$passwd)
    {
        $user=$this::select('admin_id')->whereRaw('(account = ? and password = ?)',[$name,$passwd])->get();
        $count= count($user);
        if($count!= 0)
            return $user[0]['admin_id'];
        else
            return -1;
    }

    public function find($name)
    {
        return (bool)$this::whereRaw('admin_id = ?',[$name])->count();
    }
}