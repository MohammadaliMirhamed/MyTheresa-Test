<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    const BOOTS = 'boots';
    const SANDALS = 'sandals';
    const SNEAKERS = 'sneakers';
    
    /**
     * Product relation
     */
    public function products() {
        return $this->hasMany(Product::class);
    }

    /**
     * Discount relation 
     */
    public function discount() {
        return $this->morphOne(Discount::class, 'discountable');
    }
}
