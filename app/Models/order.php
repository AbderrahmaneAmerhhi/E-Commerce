<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'product_name',
         'qte',
        'price',
        'total',
        'paid',
        'delivered',

    ];

    // relation with user
    public function user(){
        return $this->belongsTo(user::class);
    }
    public function items(){
        return $this->hasMany(item::class);
    }
}
