<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable =[
        'name','user_id'];
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
