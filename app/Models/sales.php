<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\PaymentMethod;

class sales extends Model
{
    protected $fillable = [
        'customer_id',
        'date',
        'total_amount',
        'payment_method',
        'note',
    ];
    public function customer()
    {
        return $this->belongsTo(customers::class, 'customer_id');
    }
    
}
