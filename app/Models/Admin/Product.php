<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug','description','image','image_list','price','sale_price','category_id','status','percent_sale'
    ];
    protected $primary = 'id';
    protected $table ='products';

     public function category(){
         return $this->belongsTo('App\Models\Admin\Category','category_id','id');
     }

  

    //  public function scopeSearch($query){
    //     if($search = request()->search){
    //         $query = $query->where('name','like','%'.$search.'%');
    //     }
    //     return $query;
    // }

    public function scopeSearch($query){

       if(request('search')){
           $search = request('search');
           $query = $query->where('name','like','%'.$search.'%');
       }
    //    if(request('category_id')){
    //     $query = $query->where('category_id',request('category_id'));
    //     }
        return $query;
    }
}
