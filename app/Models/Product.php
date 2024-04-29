<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function promotions()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }


}
