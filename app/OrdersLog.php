<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersLog extends Model
{
    protected $fillable =[
        'order_id',
        'order_status',
        'user_id'];
}
