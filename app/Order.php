<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');

    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
