<?php

namespace App\Models\Bakery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','email','phone','content'
    ];

    protected $primaryKey ='id';
    protected $table = '_contact';
}
