<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name'=>$this->faker->name(),
            'category_id'=>$this->faker->numberBetween(1,3),
            'price'=>$this->faker->numberBetween(50,100),
            'image'=>$this->faker->imageUrl(),
            
        ];
    }
}
