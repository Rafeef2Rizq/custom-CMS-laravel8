<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallary extends Model
{

    public $uploads="/images/posts/";
    use HasFactory;
    protected $fillable=['image'];
    public function getImageUrlAttribute(){

         return  $this->uploads.$this->image ;
    }
}
