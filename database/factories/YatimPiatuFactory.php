<?php

namespace Database\Factories;

use App\Models\RT;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\YatimPiatu>
 */
class YatimPiatuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'nama_ibu' => $this->faker->name,
            'nama_ayah' => $this->faker->name,
            'status' => $this->faker->randomElement(['yatim', 'piatu']),
            'pendidikan' => $this->faker->randomElement(['sd', 'smp', 'sma']),
            'biaya' => $this->faker->numberBetween(100000, 1000000),
            'alamat' => $this->faker->address,
            'pembuatData_id' => User::factory()->create()->id,
            'id_RT' => RT::inRandomOrder()->first()->id_RT,
        ];
    }
}
