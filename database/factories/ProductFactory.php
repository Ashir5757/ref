<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker; // Add this import statement

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create(); // Add this line to create a new instance of the Faker generator

        return [
            'user_id' => User::factory()->create()->id,
            'name' => $faker->words(3, true), // Generate a random name
            'price' => $faker->randomFloat(2, 10, 100), // Generate a random price
            'description' => $faker->sentence(), // Generate a random description
            'category_id' => 1, // Generate a random category_id
        ];
    }
}