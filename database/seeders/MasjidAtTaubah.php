<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasjidAtTaubah extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\RT::factory(10)->create();

        \App\Models\User::factory(5)->create();

        \App\Models\User::factory()->adminAccount()->create();

        \App\Models\Muzakki::factory(5)->create();

        \App\Models\Mustahik::factory(5)->create();

        \App\Models\YatimPiatu::factory(5)->create();
    }
}
