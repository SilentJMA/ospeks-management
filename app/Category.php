<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','user_id'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');

    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');

    }

}
