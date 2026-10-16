<?php

namespace Database\Factories;

use App\Models\RT;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengqurbanSapi>
 */
class PengqurbanSapiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_satu' => fake()->name(),
            'nama_dua' => fake()->name(),
            'nama_tiga' => fake()->name(),
            'nama_empat' => fake()->name(),
            'nama_lima' => fake()->name(),
            'nama_enam' => fake()->name(),
            'nama_tujuh' => fake()->name(),
            'pahala_satu' => fake()->sentence(),
            'pahala_dua' => fake()->sentence(),
            'pahala_tiga' => fake()->sentence(),
            'pahala_empat' => fake()->sentence(),
            'pahala_lima' => fake()->sentence(),
            'pahala_enam' => fake()->sentence(),
            'pahala_tujuh' => fake()->sentence(),
            'hak_pengqurban' => fake()->randomElement(['kepala', 'kaki', 'jeroan', 'kulit']),
            'jenis_hewan' => fake()->randomElement(['sapi', 'kerbau']),
            'biaya' => fake()->numberBetween(100000, 1000000),
            'status_pembayaran' => fake()->randomElement(['Lunas', 'Belum Lunas']),
            'pembuatData_id' => User::factory()->create()->id,
            'nomor_antrian' => fake()->numberBetween(1, 100),
            'id_RT' => RT::inRandomOrder()->first()->id_RT,
        ];
    }
}
