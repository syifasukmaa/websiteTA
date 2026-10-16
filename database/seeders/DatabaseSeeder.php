<?php

namespace Database\Seeders;

use App\Models\Duafa;
use App\Models\Mustahik;
use App\Models\Muzakki;
use App\Models\PendaftarQurban;
use App\Models\PengqurbanSapi;
use App\Models\RT;
use App\Models\User;
use App\Models\YatimPiatu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed RTs
        $rtList = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', 'Lainnya'];
        $createdRts = [];
        foreach ($rtList as $nomor) {
            $createdRts[] = RT::firstOrCreate(['nomor_RT' => $nomor]);
        }

        // 2. Ensure Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin1@gmail.com'],
            [
                'name' => 'Admin Masjid',
                'password' => Hash::make('admin1234'),
                'role' => 'admin',
                'email_verified_at' => now(),
                'id_RT' => $createdRts[0]->id_RT,
            ]
        );

        // 3. Ensure Ketua RT User
        $ketuaRt = User::firstOrCreate(
            ['email' => 'ketuart@gmail.com'],
            [
                'name' => 'Ketua RT 01',
                'password' => Hash::make('password123'),
                'role' => 'ketua_rt',
                'email_verified_at' => now(),
                'id_RT' => $createdRts[0]->id_RT,
            ]
        );

        // 4. Seed Mustahik
        $mustahikSamples = [
            [
                'nama_keluarga' => 'Keluarga Bpk. Rahmat',
                'kelompok' => 'fakir miskin',
                'nama_suami' => 'Rahmat Hidayat',
                'nama_istri' => 'Siti Aminah',
                'alamat' => 'Jl. Ir. H. Juanda No. 12, RT 01',
                'nomor_hp' => '081234567890',
                'id_RT' => $createdRts[0]->id_RT,
                'pembuatData_id' => $admin->id,
            ],
            [
                'nama_keluarga' => 'Keluarga Ibu Halimah',
                'kelompok' => 'fakir miskin',
                'nama_suami' => null,
                'nama_istri' => 'Halimah',
                'alamat' => 'Gang Melati No. 4, RT 02',
                'nomor_hp' => '081298765432',
                'id_RT' => $createdRts[1]->id_RT,
                'pembuatData_id' => $admin->id,
            ],
            [
                'nama_keluarga' => 'Keluarga Bpk. Joko',
                'kelompok' => 'fisabilillah',
                'nama_suami' => 'Joko Susanto',
                'nama_istri' => 'Mariana',
                'alamat' => 'Jl. Kemakmuran No. 18, RT 03',
                'nomor_hp' => '085712349876',
                'id_RT' => $createdRts[2]->id_RT,
                'pembuatData_id' => $admin->id,
            ],
            [
                'nama_keluarga' => 'Keluarga Bpk. Syafiq',
                'kelompok' => 'mualaf',
                'nama_suami' => 'Syafiq Nugraha',
                'nama_istri' => 'Dewi Lestari',
                'alamat' => 'Jl. Juanda Blok B No. 9, RT 04',
                'nomor_hp' => '087811223344',
                'id_RT' => $createdRts[3]->id_RT,
                'pembuatData_id' => $admin->id,
            ],
            [
                'nama_keluarga' => 'Keluarga Bpk. Hendra',
                'kelompok' => 'amilin',
                'nama_suami' => 'Hendra Setiawan',
                'nama_istri' => 'Rini Astuti',
                'alamat' => 'Jl. Musholla No. 7, RT 05',
                'nomor_hp' => '089655443322',
                'id_RT' => $createdRts[4]->id_RT,
                'pembuatData_id' => $admin->id,
            ],
        ];

        foreach ($mustahikSamples as $data) {
            Mustahik::firstOrCreate(['nama_keluarga' => $data['nama_keluarga']], $data);
        }

        // 5. Seed Muzakki
        $muzakkiSamples = [
            [
                'nama_muzakki' => 'Ahmad Fauzi',
                'jumlah_jiwa' => 4,
                'beras' => 10,
                'uang' => 180000,
                'infaq' => 50000,
                'alamat' => 'Perum Sukmajaya Indah Blok C3',
                'keterangan' => 'Zakat Fitrah 4 Jiwa',
                'penerima_id' => $admin->id,
                'id_RT' => $createdRts[0]->id_RT,
            ],
            [
                'nama_muzakki' => 'Bambang Irawan',
                'jumlah_jiwa' => 3,
                'beras' => 0,
                'uang' => 135000,
                'infaq' => 100000,
                'alamat' => 'Jl. Ir. H. Juanda No. 55',
                'keterangan' => 'Zakat Fitrah & Infaq Masjid',
                'penerima_id' => $admin->id,
                'id_RT' => $createdRts[1]->id_RT,
            ],
            [
                'nama_muzakki' => 'Dedi Kurniawan',
                'jumlah_jiwa' => 5,
                'beras' => 12.5,
                'uang' => 0,
                'infaq' => 25000,
                'alamat' => 'Jl. Dahlia No. 10, RT 02',
                'keterangan' => 'Zakat Beras',
                'penerima_id' => $admin->id,
                'id_RT' => $createdRts[1]->id_RT,
            ],
        ];

        foreach ($muzakkiSamples as $data) {
            Muzakki::firstOrCreate(['nama_muzakki' => $data['nama_muzakki']], $data);
        }

        // 6. Seed Duafa
        $duafaSamples = [
            [
                'nama' => 'Ibu Rohani',
                'nama_istri' => null,
                'nama_suami' => null,
                'status' => 'Janda',
                'jumlah_uang' => 200000,
                'penerimaan' => 'selesai',
                'keterangan' => 'Duafa Lansia',
                'pembuatData_id' => $admin->id,
                'id_RT' => $createdRts[0]->id_RT,
                'RW' => '16',
            ],
            [
                'nama' => 'Pak Usman',
                'nama_istri' => null,
                'nama_suami' => null,
                'status' => 'Duda',
                'jumlah_uang' => 250000,
                'penerimaan' => 'belum',
                'keterangan' => 'Duafa/Marbot',
                'pembuatData_id' => $admin->id,
                'id_RT' => $createdRts[1]->id_RT,
                'RW' => '16',
            ],
        ];

        foreach ($duafaSamples as $data) {
            Duafa::firstOrCreate(['nama' => $data['nama']], $data);
        }

        // 7. Seed Yatim Piatu
        $yatimSamples = [
            [
                'nama' => 'Muhammad Bilal',
                'nama_ibu' => 'Aisyah',
                'nama_ayah' => 'Alm. Farhan',
                'status' => 'yatim',
                'pendidikan' => 'sd',
                'biaya' => 300000,
                'alamat' => 'Jl. Melati RT 01 RW 16',
                'pembuatData_id' => $admin->id,
                'id_RT' => $createdRts[0]->id_RT,
            ],
            [
                'nama' => 'Fatimah Zahra',
                'nama_ibu' => 'Khadijah',
                'nama_ayah' => 'Alm. Ridwan',
                'status' => 'yatim',
                'pendidikan' => 'smp',
                'biaya' => 400000,
                'alamat' => 'Jl. Mawar RT 03 RW 16',
                'pembuatData_id' => $admin->id,
                'id_RT' => $createdRts[2]->id_RT,
            ],
        ];

        foreach ($yatimSamples as $data) {
            YatimPiatu::firstOrCreate(['nama' => $data['nama']], $data);
        }

        // 8. Seed Pendaftar Qurban Kambing
        $qurbanSamples = [
            [
                'nama' => 'dr. Hendra Pratama',
                'nomor_antrian' => 1,
                'tahun' => date('Y'),
                'tujuan_pahala' => 'Hendra Pratama bin Sudirman',
                'hak_pengqurban' => 'paha',
                'jenis_hewan' => 'kambing',
                'biaya' => 3500000,
                'status_pembayaran' => 'Lunas',
                'pembuatData_id' => $admin->id,
                'id_RT' => $createdRts[0]->id_RT,
                'RW' => '16',
            ],
            [
                'nama' => 'Budi Santoso',
                'nomor_antrian' => 2,
                'tahun' => date('Y'),
                'tujuan_pahala' => 'Budi Santoso bin Mulyadi',
                'hak_pengqurban' => 'kepala',
                'jenis_hewan' => 'domba',
                'biaya' => 3200000,
                'status_pembayaran' => 'Lunas',
                'pembuatData_id' => $admin->id,
                'id_RT' => $createdRts[1]->id_RT,
                'RW' => '16',
            ],
        ];

        foreach ($qurbanSamples as $data) {
            PendaftarQurban::firstOrCreate(['nama' => $data['nama']], $data);
        }

        // 9. Seed Pengqurban Sapi
        $sapiSamples = [
            [
                'nomor_antrian' => 1,
                'tahun' => date('Y'),
                'nama_satu' => 'Bpk. Ridwan Kamil',
                'nama_dua' => 'Ibu Atalia',
                'nama_tiga' => 'Eril Kahn',
                'nama_empat' => 'Zara Camillia',
                'nama_lima' => 'Arkana Aidan',
                'nama_enam' => 'H. Mulyadi',
                'nama_tujuh' => 'Hj. Nuraeni',
                'pahala_satu' => 'Ridwan Kamil bin Atje Misbach',
                'pahala_dua' => 'Atalia binti Syarif',
                'pahala_tiga' => 'Eril bin Ridwan Kamil',
                'pahala_empat' => 'Zara binti Ridwan Kamil',
                'pahala_lima' => 'Arkana bin Ridwan Kamil',
                'pahala_enam' => 'Mulyadi bin Ahmad',
                'pahala_tujuh' => 'Nuraeni binti Sobir',
                'hak_pengqurban' => 'paha & punggung',
                'jenis_hewan' => 'sapi',
                'biaya' => 24500000,
                'status_pembayaran' => 'Lunas',
                'pembuatData_id' => $admin->id,
                'id_RT' => $createdRts[0]->id_RT,
            ],
        ];

        foreach ($sapiSamples as $data) {
            PengqurbanSapi::firstOrCreate(['nama_satu' => $data['nama_satu']], $data);
        }
    }
}
