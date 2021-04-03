<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'name',
        'image',
        'description',
        'price',
        'sku',
        'quantity'];

    public function categories()
    {
        return $this->belongsTo(Category::class);

    }
}
