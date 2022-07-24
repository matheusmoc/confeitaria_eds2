<?php

namespace App\Models\Bakery;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','product_id','reply_id','content','status'
    ];

    protected $primaryKey ='id';
    protected $table ='comments';

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function replies(){
        
        return $this->hasMany(Comment::class,'reply_id','id');
    }

    public function product(){
        return $this->belongsTo('App\Models\Admin\product','product_id','id');
    }
}
