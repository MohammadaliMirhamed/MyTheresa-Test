<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $created_at = Carbon::now()->format('Y-m-d H:i:s');
        $updated_at = Carbon::now()->format('Y-m-d H:i:s');
        
        DB::table('discounts')->insert([
            [
                'amount' => '15',
                'discountable_id' => Product::where('sku', '000003')->first()->id,
                'discountable_type' => Product::class,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ], [
                'amount' => '30',
                'discountable_id' => Category::where('name', Category::BOOTS)->first()->id,
                'discountable_type' => Category::class,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ],
        ]);
    }
}
