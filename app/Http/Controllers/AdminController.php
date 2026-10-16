<?php

namespace App\Http\Controllers;

use App\Models\Duafa;
use App\Models\Mustahik;
use App\Models\Muzakki;
use App\Models\PendaftarQurban;
use App\Models\PengqurbanSapi;
use App\Models\YatimPiatu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $muzakkiCount = Muzakki::count();
        $mustahikCount = Mustahik::count();
        $orphanCount = YatimPiatu::count();
        $duafaCount = Duafa::count();
        $goatCount = PendaftarQurban::count();
        $cowCount = PengqurbanSapi::count();

        $totalQurbanFunds = PendaftarQurban::sum('biaya') + PengqurbanSapi::sum('biaya');
        $totalZakatMoney = Muzakki::sum('uang');
        $totalRiceZakat = Muzakki::sum('beras');
        $totalInfaq = Muzakki::sum('infaq');
        $totalDuafaAssistance = Duafa::sum('jumlah_uang');
        $totalOrphanAssistance = YatimPiatu::sum('biaya');

        $mustahikPerRt = Mustahik::with('RTWarga')
            ->selectRaw('id_RT, COUNT(*) as jumlah')
            ->groupBy('id_RT')
            ->get();

        $recentMuzakkis = Muzakki::with('RTWarga')->latest()->take(5)->get();
        $recentMustahiks = Mustahik::with('RTWarga')->latest()->take(5)->get();

        return view(
            'admin.dahboard',
            compact(
                'muzakkiCount',
                'mustahikCount',
                'orphanCount',
                'duafaCount',
                'goatCount',
                'cowCount',
                'totalQurbanFunds',
                'totalZakatMoney',
                'totalRiceZakat',
                'totalInfaq',
                'totalDuafaAssistance',
                'totalOrphanAssistance',
                'mustahikPerRt',
                'recentMuzakkis',
                'recentMustahiks'
            )
        );
    }
}
