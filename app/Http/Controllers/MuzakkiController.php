<?php

namespace App\Http\Controllers;

use App\Http\Requests\MuzakkiRequest;
use App\Models\Muzakki;
use App\Models\RT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MuzakkiController extends Controller
{
    public function index()
    {
        $muzakki = Muzakki::with('RTWarga')->latest();
        $totalRice = Muzakki::sum('beras');
        $totalZakatMoney = Muzakki::sum('uang');
        $totalInfaq = Muzakki::sum('infaq');

        if (request('search')) {
            $search = request('search');
            $muzakki->where(function ($query) use ($search) {
                $query->where('nama_muzakki', 'like', '%' . $search . '%')
                    ->orWhere('jumlah_jiwa', 'like', '%' . $search . '%')
                    ->orWhere('uang', 'like', '%' . $search . '%')
                    ->orWhere('beras', 'like', '%' . $search . '%')
                    ->orWhereHas('RTWarga', function ($q) use ($search) {
                        $q->where('nomor_RT', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('penerimaZakat', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        return view('admin.zakat.muzakki.dashboard', [
            'zakats' => $muzakki->paginate(15),
            'totalRice' => $totalRice,
            'totalZakatMoney' => $totalZakatMoney,
            'totalInfaq' => $totalInfaq,
        ]);
    }

    public function create()
    {
        return view(
            'admin.zakat.muzakki.create',
            [
                'rt' => RT::all(),
            ]
        );
    }

    public function store(MuzakkiRequest $request)
    {
        $data = array_merge($request->validated(), [
            'penerima_id' => Auth::id(),
        ]);

        $zakat = Muzakki::create($data);

        session()->flash('success', 'Data muzakki ' . $zakat->nama_muzakki . ' berhasil ditambahkan');
        return redirect()->route('admin.muzakki.index');
    }

    public function edit($id)
    {
        return view('admin.zakat.muzakki.edit', [
            'zakat' => Muzakki::findOrFail($id),
            'rt' => RT::all(),
        ]);
    }

    public function show($id)
    {
        return view('admin.zakat.muzakki.detail', [
            'zakat' => Muzakki::findOrFail($id),
        ]);
    }

    public function update(MuzakkiRequest $request, $id)
    {
        $zakat = Muzakki::findOrFail($id);
        $zakat->update($request->validated());

        session()->flash('success', 'Data muzakki ' . $zakat->nama_muzakki . ' berhasil diubah');
        return redirect()->route('admin.muzakki.index');
    }

    public function destroy($id)
    {
        $zakat = Muzakki::findOrFail($id);
        $zakat->delete();

        session()->flash('success', 'Data muzakki ' . $zakat->nama_muzakki . ' berhasil dihapus');
        return redirect()->route('admin.muzakki.index');
    }
}
