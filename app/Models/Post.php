<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
   protected $fillable=['category_id','gallary_id','title','description','is_publish'];
    public static function  roleValidation( ){
     return [
            'title'=>['required','min:2','max:20'],
            'category_id'=>['required'],
            'description'=>['min:10','max:2000'],
            'is_publish'=>['required'],
            'file'=>['required','image' ,'mimes:jpg,bmp,png,jepg' ,'dimensions:min_width=100,min_height=200'],
    ];
    }
}
