<?php

namespace App\Http\Controllers;

use App\Models\Muzakki;
use App\Models\RT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MuzakkiController extends Controller
{
    public function index()
    {
        $muzakki = Muzakki::with('RTWarga')->latest();

        if (request('search')) {
            $muzakki->where('nama_muzakki', 'like', '%' . request('search') . '%')
                ->orWhere('created_at', 'like', '%' . request('search') . '%')
                ->orWhere('jumlah_jiwa', 'like', '%' . request('search') . '%')
                ->orWhere('uang', 'like', '%' . request('search') . '%')
                ->orWhere('beras', 'like', '%' . request('search') . '%')
                ->orWhereHas('RTWarga', function ($query) {
                    $query->where('nomor_RT', 'like', '%' . request('search') . '%');
                })
                ->orWhereHas('penerimaZakat', function ($query) {
                    $query->where('name', 'like', '%' . request('search') . '%');
                })
            ;
        }

        return view('admin.zakat.muzakki.dashboard', [
            'zakats' => $muzakki->paginate(5),
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

    public function store(Request $request)
    {
        $request->validate([
            'nama_muzakki' => 'required',
            'jumlah_jiwa' => 'required',
            'alamat' => 'required',
            'id_RT' => 'required',
        ]);
        $zakat = new Muzakki();
        $zakat->nama_muzakki = $request->nama_muzakki;
        $zakat->jumlah_jiwa = $request->jumlah_jiwa;
        $zakat->beras = $request->beras;
        $zakat->uang = $request->uang;
        $zakat->infaq = $request->infaq;
        $zakat->alamat = $request->alamat;
        $zakat->keterangan = $request->keterangan;
        $zakat->penerima_id = Auth::id();
        $zakat->id_RT = $request->id_RT;
        $zakat->save();

        session()->flash('success', 'Data muzakki ' . $zakat->nama_muzakki . ' berhasil ditambahkan');
        return redirect()->route('admin.muzakki.index');
    }
    public function edit($id)
    {
        return view('admin.zakat.muzakki.edit', [
            'zakat' => Muzakki::where('id_muzakki', $id)->first(),
            'rt' => RT::all(),
        ]);
    }

    public function detail($id)
    {
        return view('admin.zakat.muzakki.detail', [
            'zakat' => Muzakki::where('id_muzakki', $id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $zakat = Muzakki::findOrfail($id);
        if ($zakat) {
            $zakat->update([
                'nama_muzakaki' => $request->nama_muzakki,
                'jumlah_jiwa' => $request->jumlah_jiwa,
                'beras' => $request->beras,
                'uang' => $request->uang,
                'infaq' => $request->infaq,
                'alamat' => $request->alamat,
                'keterangan' => $request->keterangan,
            ]);
        }

        session()->flash('success', 'Data muzakki ' . $zakat->nama_muzakki . ' berhasil diubah');
        return redirect()->route('admin.muzakki.index');
    }

    public function delete($id)
    {
        $zakat = Muzakki::findOrfail($id);
        if ($zakat) {
            $zakat->delete();
        }

        session()->flash('success', 'Data muzakki ' . $zakat->nama_muzakki . ' berhasil dihapus');
        return redirect()->route('admin.muzakki.index');
    }
}
