<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderContent extends Model
{
    use HasFactory;
    
    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }
}
