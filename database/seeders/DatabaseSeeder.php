<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            User::factory()
                    ->count(10)
                    ->has(
                        Order::factory()
                        ->count(3)
                        ->hasAttached(
                            Product::factory()->count(5),
                            ['total_price' => rand(10,100), 'total_qte' => rand(1,3)]
                        )
                    )
                    ->create();
    }
}
