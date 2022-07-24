<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'slider_name','slider_link','slider_image','slider_status'
    ];

    protected $primaryKey ='id';
    protected $table = 'sliders';


    public function scopeSearch($query){
        if($search = request()->search){
            $query = $query->where('slider_name','like','%'.$search.'%');
        }
        return $query;
    }
}
