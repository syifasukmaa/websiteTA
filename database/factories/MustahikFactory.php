<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mustahik>
 */
class MustahikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_keluarga' => fake()->name(),
            'kelompok' => fake()->randomElement(['fakir miskin', 'fisabilillah', 'mualaf', 'amilin', 'tidak semua']),
            'nama_suami' => fake()->name(),
            'nama_istri' => fake()->name(),
            'alamat' => fake()->address(),
            'nomor_hp' => fake()->phoneNumber(),
            'pembuatData_id' => User::all()->random()->id
        ];
    }
}
