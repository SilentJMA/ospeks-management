<?php

namespace App;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'name',
        'image',
        'description',
        'price',
        'sku',
        'quantity',
        'category_id',
        'user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function getImageExistAttribute()
    {
        return !is_null($this->image) && file_exists(public_path('images/' .$this->image));
    }
}
