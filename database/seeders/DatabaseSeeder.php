<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'address' => 'Default Address',
            'telephone' => '00000000000',
            'birth_date' => '2000-01-01',
            'cpf' => '12345678900',
            'balance' => 0,
        ]);
    }
}
