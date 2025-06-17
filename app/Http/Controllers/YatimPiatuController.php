<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\YatimPiatu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YatimPiatuController extends Controller
{
    public function index()
    {
        $yatims = YatimPiatu::with('RTWarga')->get();
        $jumlahSantunan = YatimPiatu::sum('biaya');

        $user = Auth::user();

        if ($user->role == 'ketua_rt') { //User adalah ketua RT
            $yatims->where(function ($query) use ($user) {
                $query->where('pembuatData_id', $user->id) // Data yang dibuat sendiri
                    ->orWhere('id_RT', $user->id_RT);    // Data dari Ketua RT lain dengan RT yang sama
            });
        }
        if (request('search')) {
            $yatims->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('nama_ibu', 'like', '%' . request('search') . '%')
                ->orWhere('nama_ayah', 'like', '%' . request('search') . '%')
                ->orWhereHas('RTWarga', function ($query) {
                    $query->where('nomor_RT', 'like', '%' . request('search') . '%');
                })
            ;
        }
        return view('admin.yatimpiatu.dashboard', [
            'yatims' => $yatims->paginate(5),
            'jumlahSantunan' => $jumlahSantunan,
        ]);
    }

    public function detail($id)
    {
        return view('admin.yatimpiatu.detail', [
            'yatim' => YatimPiatu::find($id)
        ]);
    }

    public function create()
    {
        return view('admin.yatimpiatu.create', [
            'rt' => RT::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'nama_ibu' => ['required'],
            'nama_ayah' => ['required'],
            'biaya' => ['required'],
            'alamat' => ['required'],
            'status' => ['required'],
            'pendidikan' => ['required'],
            'id_RT' => ['required'],
        ]);

        $yatim = new YatimPiatu();

        $yatim->nama = $request->nama;
        $yatim->nama_ibu = $request->nama_ibu;
        $yatim->nama_ayah = $request->nama_ayah;
        $yatim->biaya = $request->biaya;
        $yatim->alamat = $request->alamat;
        $yatim->status = $request->status;
        $yatim->pendidikan = $request->pendidikan;
        $yatim->id_RT = $request->id_RT;
        $yatim->pembuatData_id = Auth::id();

        $yatim->save();

        session()->flash('success', 'Data yatim ' . $yatim->nama . ' berhasil ditambahkan');
        return redirect()->route('yatimPiatu.index');
    }
    public function edit($id)
    {
        return view('admin.yatimpiatu.edit', [
            'yatim' => YatimPiatu::where('id_yatim_piatu', $id)->first(),
            'rt' => RT::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $yatim = YatimPiatu::findOrfail($id);

        if ($yatim) {
            $yatim->update([
                'nama' => $request->nama,
                'nama_ibu' => $request->nama_ibu,
                'nama_ayah' =>   $request->nama_ayah,
                'biaya' => $request->biaya,
                'alamat' => $request->alamat,
                'status' => $request->status,
                'pendidikan' => $request->pendidikan,
                'id_RT' => $request->id_RT
            ]);
        }

        session()->flash('success', 'Data yatim ' . $yatim->nama . ' berhasil diubah');
        return redirect()->route('yatimPiatu.index');
    }
    public function delete($id)
    {
        $yatim = YatimPiatu::findOrfail($id);
        if ($yatim) {
            $yatim->delete();
        }

        session()->flash('success', 'Data yatim piatu ' . $yatim->nama . ' berhasil dihapus');
        return redirect()->route('yatimPiatu.index');
    }
}
