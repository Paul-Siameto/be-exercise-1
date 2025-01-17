<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    public function category()
    {
       return $this->belongsTo(Category::class, 'cat_id', 'id');
       return $this->belongsTo('App\Models\Category','cat_id'); 
    }
    function comments(){
        return $this->hasMany('App\Models\Comment')->orderBy('id','desc');
    }
}
