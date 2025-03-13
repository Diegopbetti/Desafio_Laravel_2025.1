<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'reference_id',
        'product_id',
        'buyer_id',
        'seller_id',
        'product_quantity',
        'total_price',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller(){
        return $this->belongsTo(User::class, 'seller_id');
    }
}
