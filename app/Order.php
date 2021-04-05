<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_price',
        'product_name',
        'product_quantity',
        'supplier_name',
        'shipping_method',
        'shipping_country',
        'shipping_tracking',
        'note',/*
        'product_id',
        'supplier_id',*/
        'status_id',
        'user_id'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');

    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class,'status_id');
    }
}
