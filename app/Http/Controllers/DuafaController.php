<?php

namespace App\Http\Controllers;

use App\Http\Requests\DuafaRequest;
use App\Models\Duafa;
use App\Models\RT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DuafaController extends Controller
{
    public function index()
    {
        $duafas = Duafa::with('RTWarga')->latest();
        $totalAssistanceAmount = Duafa::sum('jumlah_uang');
        $user = Auth::user();

        if ($user->role == 'ketua_rt') {
            $duafas->where(function ($query) use ($user) {
                $query->where('pembuatData_id', $user->id)
                    ->orWhere('id_RT', $user->id_RT);
            });
        }

        if (request('search')) {
            $search = request('search');
            $duafas->where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('nama_istri', 'like', '%' . $search . '%')
                    ->orWhere('nama_suami', 'like', '%' . $search . '%')
                    ->orWhere('keterangan', 'like', '%' . $search . '%')
                    ->orWhereHas('RTWarga', function ($q) use ($search) {
                        $q->where('nomor_RT', 'like', '%' . $search . '%');
                    });
            });
        }

        return view('admin.duafa.dashboard', [
            'duafas' => $duafas->paginate(8),
            'totalAssistanceAmount' => $totalAssistanceAmount,
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

    public function store(DuafaRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();
        $data['pembuatData_id'] = $user->id;

        if ($user->role === 'ketua_rt') {
            $data['id_RT'] = $user->id_RT;
        }

        $duafa = Duafa::create($data);

        session()->flash('success', 'Data duafa ' . $duafa->nama . ' berhasil ditambahkan');
        return redirect()->route('duafa.index');
    }

    public function show($id)
    {
        $duafa = Duafa::with('RTWarga')->findOrFail($id);
        $user = Auth::user();

        if ($user->role === 'ketua_rt' && !($duafa->id_RT == $user->id_RT || $duafa->pembuatData_id == $user->id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk data duafa ini.');
        }

        return view('admin.duafa.detail', [
            'duafa' => $duafa,
            'rt' => RT::all(),
        ]);
    }

    public function edit($id)
    {
        $duafa = Duafa::findOrFail($id);
        $user = Auth::user();

        if ($user->role === 'ketua_rt' && !($duafa->id_RT == $user->id_RT || $duafa->pembuatData_id == $user->id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk data duafa ini.');
        }

        return view('admin.duafa.edit', [
            'duafa' => $duafa,
            'rt' => RT::all(),
        ]);
    }

    public function update(DuafaRequest $request, $id)
    {
        $duafa = Duafa::findOrFail($id);
        $user = Auth::user();

        if ($user->role === 'ketua_rt' && !($duafa->id_RT == $user->id_RT || $duafa->pembuatData_id == $user->id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk mengubah data duafa ini.');
        }

        $data = $request->validated();
        if ($user->role === 'ketua_rt') {
            $data['id_RT'] = $user->id_RT;
        }

        $duafa->update($data);

        session()->flash('success', 'Data duafa ' . $duafa->nama . ' berhasil diubah');
        return redirect()->route('duafa.index');
    }

    public function destroy($id)
    {
        $duafa = Duafa::findOrFail($id);
        $user = Auth::user();

        if ($user->role === 'ketua_rt' && !($duafa->id_RT == $user->id_RT || $duafa->pembuatData_id == $user->id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk menghapus data duafa ini.');
        }

        $duafa->delete();

        session()->flash('success', 'Data duafa ' . $duafa->nama . ' berhasil dihapus');
        return redirect()->route('duafa.index');
    }
}
