<?php

namespace App;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-m-Y');
    }
    protected $fillable = [
        'product_price',
        'product_quantity',
        'shipping_cost',
        'shipping_country',
        'shipping_tracking',
        'note',
        'order_date',
        'product_id',
        'shipping_id',
        'supplier_id',
        'status_id',
        'user_id'];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id',);

    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class,'status_id');
    }
    public function shipping()
    {
        return $this->belongsTo(Shipping::class,'shipping_id');
    }
    public function getOrderDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d',$this->attributes['order_date'])->format('d/m/Y');
    }
}
