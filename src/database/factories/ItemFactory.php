<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'owner_id' => random_int(1, 10),
            'type_id' => random_int(1, TypeFactory::countTypes()),
            'description' => $this->faker->sentence(),
            'warranty_start' => $this->faker->date(),
            'warranty_months' => random_int(12, 72),
            'warranty_proof' => $this->faker->company(),
        ];
    }
}
