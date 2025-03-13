<?php

namespace Database\Factories;

use App\Models\RT;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Duafa>
 */
class DuafaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'nama_istri' => $this->faker->name(),
            'nama_suami' => $this->faker->name(),
            'status' => $this->faker->randomElement(['Janda', 'Duda']),
            'jumlah_uang' => $this->faker->numberBetween(100000, 250000),
            'penerimaan' => $this->faker->randomElement(['selesai', 'belum']),
            'keterangan' => $this->faker->randomElement(['Duafa', 'Duafa/Marbot', 'Duafa/Jaktu', 'Duafa/Wantu']),
            'pembuatData_id' => User::factory()->create()->id,
            'id_RT' => RT::inRandomOrder()->first()->id_RT,
            'RW' => $this->faker->randomElement(['16', '21', 'lainnya']),
        ];
    }
}
