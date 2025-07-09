<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Oreo Biscuits',
                'image' => 'oreo.png',
                'price' => 1.99,
                'category' => 'Snacks'
            ],
            [
                'name' => 'Coke',
                'image' => 'coke.png',
                'price' => 0.99,
                'category' => 'Drinks'
            ],
        ]);
    }
}
