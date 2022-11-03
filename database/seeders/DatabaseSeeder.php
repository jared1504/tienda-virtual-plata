<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

       /*  User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
        ]);
        User::factory(10)->create();
         */
        Category::factory(5)->create();
        Product::factory(100)->create();
        Sale::factory(20)->create();
        SaleDetail::factory(500)->create();
        Admin::factory(20)->create();
        Client::factory(20)->create();
        Cart::factory(200)->create();
    }
}
