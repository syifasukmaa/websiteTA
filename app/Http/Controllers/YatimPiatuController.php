<?php

namespace App\Http\Controllers;

use App\Http\Requests\YatimPiatuRequest;
use App\Models\RT;
use App\Models\YatimPiatu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YatimPiatuController extends Controller
{
    public function index()
    {
        $yatims = YatimPiatu::with('RTWarga')->oldest();
        $totalAssistanceAmount = YatimPiatu::sum('biaya');
        $user = Auth::user();

        if ($user->role == 'ketua_rt') {
            $yatims->where(function ($query) use ($user) {
                $query->where('pembuatData_id', $user->id)
                    ->orWhere('id_RT', $user->id_RT);
            });
        }

        if (request('search')) {
            $search = request('search');
            $yatims->where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('nama_ibu', 'like', '%' . $search . '%')
                    ->orWhere('nama_ayah', 'like', '%' . $search . '%')
                    ->orWhereHas('RTWarga', function ($q) use ($search) {
                        $q->where('nomor_RT', 'like', '%' . $search . '%');
                    });
            });
        }

        return view('admin.yatimpiatu.dashboard', [
            'yatims' => $yatims->paginate(5),
            'totalAssistanceAmount' => $totalAssistanceAmount,
        ]);
    }

    public function show($id)
    {
        $yatim = YatimPiatu::with('RTWarga')->findOrFail($id);
        $user = Auth::user();

        if ($user->role === 'ketua_rt' && !($yatim->id_RT == $user->id_RT || $yatim->pembuatData_id == $user->id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk data yatim ini.');
        }

        return view('admin.yatimpiatu.detail', [
            'yatim' => $yatim
        ]);
    }

    public function create()
    {
        return view('admin.yatimpiatu.create', [
            'rt' => RT::all()
        ]);
    }

    public function store(YatimPiatuRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();
        $data['pembuatData_id'] = $user->id;

        if ($user->role === 'ketua_rt') {
            $data['id_RT'] = $user->id_RT;
        }

        $yatim = YatimPiatu::create($data);

        session()->flash('success', 'Data yatim ' . $yatim->nama . ' berhasil ditambahkan');
        return redirect()->route('yatimPiatu.index');
    }

    public function edit($id)
    {
        $yatim = YatimPiatu::findOrFail($id);
        $user = Auth::user();

        if ($user->role === 'ketua_rt' && !($yatim->id_RT == $user->id_RT || $yatim->pembuatData_id == $user->id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk data yatim ini.');
        }

        return view('admin.yatimpiatu.edit', [
            'yatim' => $yatim,
            'rt' => RT::all(),
        ]);
    }

    public function update(YatimPiatuRequest $request, $id)
    {
        $yatim = YatimPiatu::findOrFail($id);
        $user = Auth::user();

        if ($user->role === 'ketua_rt' && !($yatim->id_RT == $user->id_RT || $yatim->pembuatData_id == $user->id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk mengubah data yatim ini.');
        }

        $data = $request->validated();
        if ($user->role === 'ketua_rt') {
            $data['id_RT'] = $user->id_RT;
        }

        $yatim->update($data);

        session()->flash('success', 'Data yatim ' . $yatim->nama . ' berhasil diubah');
        return redirect()->route('yatimPiatu.index');
    }

    public function destroy($id)
    {
        $yatim = YatimPiatu::findOrFail($id);
        $user = Auth::user();

        if ($user->role === 'ketua_rt' && !($yatim->id_RT == $user->id_RT || $yatim->pembuatData_id == $user->id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk menghapus data yatim ini.');
        }

        $yatim->delete();

        session()->flash('success', 'Data yatim piatu ' . $yatim->nama . ' berhasil dihapus');
        return redirect()->route('yatimPiatu.index');
    }
}
