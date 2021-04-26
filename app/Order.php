<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['name','surname','address','email','total_price','product_id','status_id'];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
}
