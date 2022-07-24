<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_ct','loai_ct','muc_giam','nhom_sp','san_pham','so_luong','tg_bat_dau','tg_ket_thuc'
    ];

    protected $primaryKey ='id';
    protected $table = 'coupons';

    public function category(){
        return $this->belongsTo('App\Models\Admin\Category','nhom_sp','id');
    }

    public function product(){
        return $this->belongsTo('App\Models\Admin\Product','san_pham','id');
    }
}
