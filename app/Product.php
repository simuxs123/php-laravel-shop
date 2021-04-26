<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Category;
class Product extends Model
{
    protected $fillable=['title','path','price','quantity','content','user_id','category_id'];
    public function categories(){
       return $this->belongsTo(Category::class,'category_id');
    }

}
