<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Carbon\Carbon;

class CategorySeeder extends Seeder
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
        
        DB::table('categories')->insert([
            [
                'name' => Category::BOOTS,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ],
            [
                'name' => Category::SANDALS,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ],
            [
                'name' => Category::SNEAKERS,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            ]
        ]);
    }
}
