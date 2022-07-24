<?php

namespace App\Models\Bakery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBill extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_bill','id_product','quantity','price'
    ];

    protected $primaryKey ='id';
    protected $table ='detail_bill';

    public function bill(){
        return $this->belongsTo('App\Models\Bakery\Bill','id_bill','id');
    }

    public function product(){
        return $this->belongsTo('App\Models\Admin\Product','id_product','id');
    }
}
