<?php

namespace App\Models;
use App\Models\sales;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $fillable = [
        "sale_id",
        "product_id",
        "quantity",
    ];

    public function sale()
    {
        return $this->belongsTo(sales::class, 'sale_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // dynamic price
    public function getPriceAttribute()
    {
        return $this->product ? $this->product->product_price  : 0;
    }

    public function getSubtotalAttribute()
    {
        return $this->quantity * $this->price ;
    }
}
