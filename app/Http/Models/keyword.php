<?php
/**
 * Created by PhpStorm.
 * User: Tan
 * Date: 2018/6/20
 * Time: 15:03
 */
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
class keyword extends Model
{
    protected $table='paper_key';
    public $timestamps=false;

    public function showRecommendKeyword()
    {
        return $this->where('paper_id', '<', 20)
            ->get();
    }
}