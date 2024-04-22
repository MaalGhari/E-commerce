<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
       'image',
       'brand',
       'description',
       'size',
       'color',
       'price',
       'stock',
       'category_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    // public function categories(){
    //     return $this->belongsTo(Category::class, 'category_id');
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
