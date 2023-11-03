<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;
    protected   $fillable = [
        "title",
        "slug",
        "description",
        "price",
        "Old_price",
        "in_Stock",
        "Qte",
        "Country_Mad",
        "image",
       // "Approve",
        "category_id"
    ];
    public function getRouteKeyName()
     {
         return 'slug';
     }
    // relation with category

    public function category()
    {
      return $this->belongsTo(category::class);
    }
    // relation wit comments
    public function comments(){
        return $this->hasMany(comment::class);
    }

    public function order(){
        return $this->belongsTo(order::class);
    }

}
