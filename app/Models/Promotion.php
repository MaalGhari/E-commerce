<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_id',
        'reduced_price',
        'percentage_reduction',
        'start_date',
        'end_date',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
