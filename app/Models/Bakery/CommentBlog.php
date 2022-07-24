<?php

namespace App\Models\Bakery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentBlog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','blog_id','reply_id','content','status'
    ];

    protected $primaryKey ='id';
    protected $table ='comment_blogs';


    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
