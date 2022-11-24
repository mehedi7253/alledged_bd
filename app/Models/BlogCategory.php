<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;


    // public function brands()
    // {
    //     return $this->hasOne(SocialLink::class, 'product_category');
    // }

    public function brands()
    {
        // return $this->hasMany(SocialLink::class);
        return $this->hasMany(SocialLink::class ,"product_category");

    }
}
