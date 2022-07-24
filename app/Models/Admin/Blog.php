<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_blog','slug_blog','synopsis_blog','category_blog','description_blog','img_blog','tag_blog','status_blog'
    ];
    protected $primaryKey = 'id';
    protected $table = 'blogs';

    public function category(){
        return $this->belongsTo('App\Models\Admin\Category','category_blog','id');
    }



    public function scopeSearch($query){
        if($search = request()->search){
            $query = $query->where('name_blog','like','%'.$search.'%');
        }
        return $query;
    }
}
