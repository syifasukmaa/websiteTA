<?php

namespace App\Http\Controllers;

use App\Models\Duafa;
use App\Models\RT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DuafaController extends Controller
{
    public function index()
    {
        $duafas = Duafa::with('RTWarga')->latest();
        $jumlahBiaya = Duafa::sum('jumlah_uang');

        $user = Auth::user();

        if ($user->role == 'ketua_rt') { //User adalah ketua RT
            $duafas->where(function ($query) use ($user) {
                $query->where('pembuatData_id', $user->id) // Data yang dibuat sendiri
                    ->orWhere('id_RT', $user->id_RT);    // Data dari Ketua RT lain dengan RT yang sama
            });
        }

        if (request('search')) {
            $duafas->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('nama_istri', 'like', '%' . request('search') . '%')
                ->orWhere('nama_suami', 'like', '%' . request('search') . '%')
                ->orWhere('keterangan', 'like', '%' . request('search') . '%')
                ->orWhereHas('RTWarga', function ($query) {
                    $query->where('nomor_RT', 'like', '%' . request('search') . '%');
                })
            ;
        }

        return view('admin.duafa.dashboard', [
            'duafas' => $duafas->paginate(8),
            'jumlahBiaya' => $jumlahBiaya,
        ]);
    }

    public function create()
    {
        return view(
            'admin.duafa.create',
            [
                'rt' => RT::all(),
            ]
        );
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'status' => 'required',
            'jumlah_uang' => 'required',
            'keterangan' => 'required',
            'penerimaan' => 'required',
            'id_RT' => 'required',
            'RW' => 'required',
        ]);

        $duafa = new Duafa();
        $duafa->nama = $request->nama;
        $duafa->nama_istri = $request->nama_istri;
        $duafa->nama_suami = $request->nama_suami;
        $duafa->status = $request->status;
        $duafa->jumlah_uang = $request->jumlah_uang;
        $duafa->keterangan = $request->keterangan;
        $duafa->penerimaan = $request->penerimaan;
        $duafa->id_RT = $request->id_RT;
        $duafa->RW = $request->RW;
        $duafa->pembuatData_id = Auth::id();
        $duafa->save();

        session()->flash('success', 'Data duafa ' . $duafa->nama . ' berhasil ditambahkan');
        return redirect()->route('duafa.index');
    }

    public function detail($id)
    {
        $duafa = Duafa::with('RTWarga')->findOrFail($id);
        return view('admin.duafa.detail', [
            'duafa' => $duafa,
            'rt' => RT::all(),
        ]);
    }

    public function edit($id)
    {
        $duafa = Duafa::findOrFail($id);
        return view('admin.duafa.edit', [
            'duafa' => $duafa,
            'rt' => RT::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'status' => 'required',
            'jumlah_uang' => 'required',
            'keterangan' => 'required',
            'penerimaan' => 'required',
            'id_RT' => 'required',
            'RW' => 'required',
        ]);

        $duafa = Duafa::findOrFail($id);
        $duafa->nama = $request->nama;
        $duafa->nama_istri = $request->nama_istri;
        $duafa->nama_suami = $request->nama_suami;
        $duafa->status = $request->status;
        $duafa->jumlah_uang = $request->jumlah_uang;
        $duafa->keterangan = $request->keterangan;
        $duafa->penerimaan = $request->penerimaan;
        $duafa->id_RT = $request->id_RT;
        $duafa->RW = $request->RW;
        $duafa->pembuatData_id = Auth::id();
        $duafa->save();

        session()->flash('success', 'Data duafa ' . $duafa->nama . ' berhasil diubah');
        return redirect()->route('duafa.index');
    }

    public function delete($id)
    {
        $duafa = Duafa::findOrFail($id);
        $duafa->delete();

        session()->flash('success', 'Data duafa ' . $duafa->nama . ' berhasil dihapus');
        return redirect()->route('duafa.index');
    }
}
