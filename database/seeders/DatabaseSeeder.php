<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(18)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'vwwwwwww',
            'address' => 'Default Address',
            'telephone' => '00000000000',
            'birth_date' => '2000-01-01',
            'cpf' => '12345678900',
            'balance' => 0,
        ]);

        Admin::factory(6)->create();
        
        Admin::factory()->create([
            'name' => 'Vitao',
            'email' => 'test2@example.com',
            'password' => 'vwwwwwwww',
            'address' => 'Default Address',
            'telephone' => '00000000001',
            'birth_date' => '2000-11-11',
            'cpf' => '98765432100',
        ]);

        Product::factory(36)->create();

    }
}
