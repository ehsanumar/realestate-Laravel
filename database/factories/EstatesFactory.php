<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use App\Models\Estates;
use App\Models\EstatesType;
use App\Models\EstatesStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estates>
 */
class EstatesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Estates::class;
    public function definition(): array
    {
        return [
            'city_id' => City::inRandomOrder()->first()->id,
            'estate_type' => EstatesType::inRandomOrder()->first()->id,
            'status_id' => EstatesStatus::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'description' => $this->faker->text(300),
            'number_of_bathroom' => $this->faker->numberBetween(1, 4),
            'number_of_bedroom' => $this->faker->numberBetween(2, 5),
            'number_of_kitchen' => $this->faker->numberBetween(1, 3),
            'number_of_garage' => $this->faker->numberBetween(1, 4),
            'number_of_floor' => $this->faker->numberBetween(1, 20),
            'amount' => $this->faker->numberBetween(200, 40000),
            'area' => $this->faker->numberBetween(100, 2000),
        ];
    }
}
