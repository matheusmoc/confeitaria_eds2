<?php

namespace App\Models\Bakery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','product_id'
    ];

    protected $primaryKey ='id';
    protected $table = 'favorites';

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function product(){
        return $this->belongsTo('App\Models\Admin\Product','product_id','id');
    }

}
