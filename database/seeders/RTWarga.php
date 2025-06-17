<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RTWarga extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\RT::factory(1)->create();
        \App\Models\RT::firstOrCreate(['nomor_rt' => '10']);
    }
}
