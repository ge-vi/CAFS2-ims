<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypeFactory extends Factory
{
    const itemsTypes = [
        'Spausdintuvas',
        'Telefonas',
        'Kompiuteris',
        'Projektorius',
        'Televizorius',
        'Garso sistema',
        'Interaktyvi lenta',
    ];

    public static function countTypes(): int
    {
        return count(self::itemsTypes);
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => array_rand(array_flip(self::itemsTypes), 1),
            'period' => $this->faker->numberBetween(12, 36)
        ];
    }
}
