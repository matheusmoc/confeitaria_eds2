<?php

namespace App\Models\Bakery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','total_id','pay','note','address','phone','status'
    ];

    protected $primaryKey ='id';
    protected $table ='bill';

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function detailBill(){
        return $this->belongsTo('App\Models\Bakery\DetailBill','id','id_bill');
    }

}
