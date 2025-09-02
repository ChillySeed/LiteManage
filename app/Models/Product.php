<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'product_name',
    'product_brand',
    'product_category',
    'product_price',
    'product_stock',
    'product_unit',
    'product_barcode',
    'expiration_date',
    ];
}
