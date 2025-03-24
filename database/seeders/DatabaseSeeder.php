<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Product::factory(10)->create();
        

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'email_verified_at' => Date::now(),
        //     'status' => 'active',
        //     'role' => 'admin',
        //     'password' => Hash::make('password'),
        //     'created_at' => Date::now(),
        // ]);

        // Product::create([
        //     'name' => 'Lorem Ipsum',
        //     'category' => 'Random',
        //     'description' => 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
        //     'created_by' => 1,
        //     'created_at' => Date::now(),
        // ]);
    }

}
