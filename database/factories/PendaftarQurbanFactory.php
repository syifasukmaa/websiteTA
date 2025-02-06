<?php

namespace Database\Factories;

use App\Models\RT;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PendaftarQurbanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'nama' => fake()->name(),
            'tujuan_pahala' => function () {
                $faker = fake();
                $firstName = $faker->firstName(); // Nama depan acak
                $lastName = $faker->lastName();   // Nama belakang acak
                $gender = $faker->randomElement(['bin', 'binti']); // Pilih 'bin' atau 'binti'

                return "$firstName $gender $lastName";
            },
            'nomor_antrian' => fake()->numberBetween(1, 100),
            'tahun' => fake()->year(),
            'hak_pengqurban' => fake()->randomElement(['kepala', 'kaki', 'jeroan', 'kulit']),
            'jenis_hewan' => fake()->randomElement(['kambing', 'domba', 'sapi', 'kerbau']),
            'biaya' => fake()->numberBetween(100000, 1000000),
            'status_pembayaran' => fake()->randomElement(['Lunas', 'Belum Lunas']),
            'pembuatData_id' => User::factory()->create()->id,
            'id_RT' => RT::inRandomOrder()->first()->id_RT,
        ];
    }
}
