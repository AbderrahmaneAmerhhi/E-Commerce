<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected   $fillable = [
        'title',
        "slug",
        'visibility',
    ];

     public function getRouteKeyName()
     {
         return 'slug';
     }
    //relations with items
    public function items(){
        return $this->hasMany(item::class);
    }
}
