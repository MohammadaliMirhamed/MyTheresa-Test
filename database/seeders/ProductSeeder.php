<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Carbon\Carbon;

class ProductSeeder extends Seeder
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
        
        DB::table('products')->insert([[
            'sku' => '000001',
            'name' => 'BV Lean leather ankle boots',
            'category_id' => Category::where('name', Category::BOOTS)->first()->id,
            'price' => 89000,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ], [
            'sku' => '000002',
            'name' => 'BV Lean leather ankle boots',
            'category_id' => Category::where('name', Category::BOOTS)->first()->id,
            'price' => 99000,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ], [
            'sku' => '000003',
            'name' => 'Ashlington leather ankle boots',
            'category_id' => Category::where('name', Category::BOOTS)->first()->id,
            'price' => 71000,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ], [
            'sku' => '000004',
            'name' => 'Naima embellished suede sandals',
            'category_id' => Category::where('name', Category::SANDALS)->first()->id,
            'price' => 79500,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ], [
            'sku' => '000005',
            'name' => 'Nathane leather sneakers',
            'category_id' => Category::where('name', Category::SNEAKERS)->first()->id,
            'price' => 59000,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ]]);
    }
}
