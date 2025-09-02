<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    protected $fillable = [
    'customer_phone',
    'customer_email',
    ];
}
