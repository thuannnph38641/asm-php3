<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'image',
        'price_regular',
        'price_sale',
        'description',
        'content',
        'category_id'

    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
