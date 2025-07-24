<?php

namespace App\Http\Controllers;

use App\Models\Mustahik;
use App\Models\Muzakki;
use App\Models\PendaftarQurban;
use App\Models\PengqurbanSapi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {

        $muzakki = Muzakki::count();
        $mustahik = Mustahik::count();
        $yatimpiatu = Mustahik::count();
        $kambing = PendaftarQurban::count();
        $sapi = PengqurbanSapi::count();
        $totalDanaQurban = PendaftarQurban::sum('biaya') + PengqurbanSapi::sum('biaya');

        $jumlahMustahikPerRT = Mustahik::with('RTWarga')
            ->selectRaw('id_RT, COUNT(*) as jumlah')
            ->groupBy('id_RT')
            ->get();


        return view(
            'admin.dahboard',
            compact('muzakki', 'mustahik', 'yatimpiatu', 'kambing', 'sapi', 'totalDanaQurban', 'jumlahMustahikPerRT')
        );
    }
}
