<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'name',
        'price',
        'quantity',
        'description',
        'category',
        'announcer_id',
    ];

    public function announcer(){
        return $this->belongsTo(User::class, 'announcer_id');
    }
    public function transactions(){
        return $this->hasMany(Transaction::class, 'product_id');
    }
}
