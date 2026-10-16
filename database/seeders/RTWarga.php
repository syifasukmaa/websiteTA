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
        $rtList = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', 'Lainnya'];
        foreach ($rtList as $nomor) {
            \App\Models\RT::firstOrCreate(['nomor_RT' => $nomor]);
        }
    }
}
