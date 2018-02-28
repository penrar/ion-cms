<?php

use Illuminate\Database\Seeder;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();

        Product::create([
            'product_name' => 'Title Search'
        ]);

        Product::create([
            'product_name' => 'Title Insurance'
        ]);

        Product::create([
            'product_name' => 'Closing'
        ]);

        Product::create([
            'product_name' => 'Recording'
        ]);
    }
}
