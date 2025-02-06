<?php

namespace App\Http\Controllers;

use App\Models\Mustahik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MustahikController extends Controller
{
    public function index()
    {
        $mustahik = Mustahik::latest();

        $user = Auth::user();

        if ($user->role == 'ketua_rt') { // Pastikan user adalah ketua RT
            $mustahik->where('pembuatData_id', $user->id);
        }

        if (request('search')) {
            $mustahik->where('nama_keluarga', 'like', '%' . request('search') . '%')
                ->orWhere('kelompok', 'like', '%' . request('search') . '%')
                ->orWhere('nomor_hp', 'like', '%' . request('search') . '%')
                ->orWhere('alamat', 'like', '%' . request('search') . '%')
                ->orWhere('nama_istri', 'like', '%' . request('search') . '%')
                ->orWhere('nama_suami', 'like', '%' . request('search') . '%')
                ->orWhereHas('pembuatData', function ($query) {
                    $query->where('name', 'like', '%' . request('search') . '%');
                })
            ;
        }

        return view('admin.zakat.mustahik.dashboard', [
            'mustahiks' => $mustahik->paginate(5),
        ]);
    }

    public function create()
    {

        return view('admin.zakat.mustahik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_keluarga' => 'required',
            'kelompok' => 'required',
            'alamat' => 'required',
        ]);

        $mustahik = new Mustahik();

        $mustahik->nama_keluarga = $request->nama_keluarga;
        $mustahik->kelompok = $request->kelompok;
        $mustahik->alamat = $request->alamat;
        $mustahik->nama_istri = $request->nama_istri;
        $mustahik->nama_suami = $request->nama_suami;
        $mustahik->nomor_hp = $request->nomor_hp;
        $mustahik->pembuatData_id = Auth::id();
        $mustahik->save();

        session()->flash('success', 'Data mustahik ' . $mustahik->nama_keluarga . ' berhasil ditambahkan');
        return redirect()->route('zakatMustahik.index');
    }
    public function detail($id)
    {
        return view('admin.zakat.mustahik.detail', [
            'mustahik' => Mustahik::where('id_mustahik', $id)->first(),
        ]);
    }
    public function edit($id)
    {
        return view('admin.zakat.mustahik.edit', [
            'mustahik' => Mustahik::where('id_mustahik', $id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $mustahik = Mustahik::findOrfail($id);

        if ($mustahik) {
            $mustahik->update([
                'nama_keluarga' => $request->nama_keluarga,
                'kelompok' => $request->kelompok,
                'nama_istri' => $request->nama_istri,
                'nama_suami' => $request->nama_suami,
                'nomor_hp' => $request->nomor_hp,
                'alamat' => $request->alamat,
            ]);
        }

        session()->flash('success', 'Data mustahik ' . $mustahik->nama_keluarga . ' berhasil diubah');
        return redirect()->route('zakatMustahik.index');
    }
    public function delete($id)
    {
        $mustahik = Mustahik::findOrfail($id);
        if ($mustahik) {
            $mustahik->delete();
        }

        session()->flash('success', 'Data mustahik ' . $mustahik->nama_keluarga . ' berhasil dihapus');
        return redirect()->route('zakatMustahik.index');
    }
}
