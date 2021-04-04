<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable =[
        'name',
        'address',
        'note',
        'url',
        'phone',
        'country',
        'email'];
}
