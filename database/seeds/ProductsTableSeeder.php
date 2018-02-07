<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'product_name' => 'Title Search'
        ]);

        Product::create([
            'product_name' => 'Title Insurance'
        ]);

        Product::create([
            'product_name' => 'Title Insurance'
        ]);
    }
}
