<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name','category_slug','category_status','category_type'
    ];

    protected $primaryKey ='id';
    protected $table = 'category';

    public function product(){
        return $this->belongsToMany('App\Models\Admin\Product','id','category_id');
    }
    public function coupon(){
        return $this->belongsTo('App\Models\Admin\Coupon','id','nhom_sp');
    }

   
    public function scopeSearch($query){
        if($search = request()->search){
            $query = $query->where('category_name','like','%'.$search.'%');
        }
        return $query;
    }
}
