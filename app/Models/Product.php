<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Category;
use App\Models\ProductGallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price'
    ];  

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function product_gallery() {
        return $this->hasMany(ProductGallery::class);
    }
    public function cart() 
    {
        return $this->hasMany(Cart::class);
    }
}
