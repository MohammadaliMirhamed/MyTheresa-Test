<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // currency always is EUR
    const DEFAULT_CURRENCY = 'EUR';

    /**
     * Category relation
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * Discount relation
     */
    public function discount() {
        return $this->morphOne(Discount::class, 'discountable');
    }
    
    /**
     * Get max discount
     * @return Attribute
     */
    protected function priceDiscountPercentage(): Attribute
    {        
        // When multiple discounts collide, the biggest discount must be applied.
        return Attribute::make(
            get: fn () => max($this->discount?->amount, $this->category->discount?->amount),
        );
    }
    
    /**
     * Get final price
     * @return Attribute
     */
    protected function priceFinal(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->price - (($this->price * $this->priceDiscountPercentage) / 100),
        );
    }
}
