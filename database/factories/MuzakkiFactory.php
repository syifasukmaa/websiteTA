<?php

namespace Database\Factories;

use App\Models\RT;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Muzakki>
 */
class MuzakkiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_muzakki' => fake()->name(),
            'jumlah_jiwa' => random_int(1, 8),
            'beras' => random_int(1, 8),
            'uang' => fake()->randomNumber(),
            'infaq' => fake()->randomNumber(),
            'alamat' => fake()->address(),
            'keterangan' => fake()->text(),
            'penerima_id' => User::all()->random()->id,
            'id_RT' => RT::inRandomOrder()->first()->id_RT,
        ];
    }
}
