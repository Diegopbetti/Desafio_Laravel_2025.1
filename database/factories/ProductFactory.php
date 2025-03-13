<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'photo' => 'images/celular.webp',
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 100, 5000),
            'quantity' => 1,
            'description' => $this->faker->sentence,
            'category' => $this->faker->word,
            'announcer_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
