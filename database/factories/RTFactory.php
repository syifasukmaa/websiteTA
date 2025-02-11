<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RT>
 */
class RTFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        static $index = 0;
        $rt_list = ['Lainnya', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10'];

        $nomor_rt = $rt_list[$index]; // Ambil nilai dari array berdasarkan index
        $index = ($index + 1) % count($rt_list); // Looping kembali ke awal setelah '10'

        return [
            'nomor_rt' => $nomor_rt, // Return nomor RT dalam rentang array
        ];
    }
}
