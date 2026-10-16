<?php

namespace App\Http\Controllers;

use App\Http\Requests\MustahikRequest;
use App\Models\Mustahik;
use App\Models\RT;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MustahikController extends Controller
{
    public function index()
    {
        $mustahik = Mustahik::latest();
        $user = Auth::user();

        if ($user->role == 'ketua_rt') {
            $mustahik->where(function ($query) use ($user) {
                $query->where('pembuatData_id', $user->id)
                    ->orWhere('id_RT', $user->id_RT);
            });
        }

        if (request('search')) {
            $search = request('search');
            $mustahik->where(function ($query) use ($search) {
                $query->where('nama_keluarga', 'like', '%' . $search . '%')
                    ->orWhere('kelompok', 'like', '%' . $search . '%')
                    ->orWhere('nomor_hp', 'like', '%' . $search . '%')
                    ->orWhere('alamat', 'like', '%' . $search . '%')
                    ->orWhere('nama_istri', 'like', '%' . $search . '%')
                    ->orWhere('nama_suami', 'like', '%' . $search . '%')
                    ->orWhereHas('pembuatData', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        return view('admin.zakat.mustahik.dashboard', [
            'mustahiks' => $mustahik->paginate(10),
            'rt' => RT::all(),
        ]);
    }

    public function create()
    {
        return view('admin.zakat.mustahik.create', [
            'rt' => RT::all(),
        ]);
    }

    public function store(MustahikRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();
        $data['pembuatData_id'] = $user->id;

        if ($user->role === 'ketua_rt') {
            $data['id_RT'] = $user->id_RT;
        }

        $mustahik = Mustahik::create($data);

        session()->flash('success', 'Data mustahik ' . $mustahik->nama_keluarga . ' berhasil ditambahkan');
        return redirect()->route('zakatMustahik.index');
    }

    public function show($id)
    {
        $mustahik = Mustahik::findOrFail($id);
        $user = Auth::user();

        if ($user->role === 'ketua_rt' && !($mustahik->id_RT == $user->id_RT || $mustahik->pembuatData_id == $user->id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk data mustahik ini.');
        }

        return view('admin.zakat.mustahik.detail', [
            'mustahik' => $mustahik,
        ]);
    }

    public function edit($id)
    {
        $mustahik = Mustahik::findOrFail($id);
        $user = Auth::user();

        if ($user->role === 'ketua_rt' && !($mustahik->id_RT == $user->id_RT || $mustahik->pembuatData_id == $user->id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk data mustahik ini.');
        }

        return view('admin.zakat.mustahik.edit', [
            'mustahik' => $mustahik,
            'rt' => RT::all()
        ]);
    }

    public function update(MustahikRequest $request, $id)
    {
        $mustahik = Mustahik::findOrFail($id);
        $user = Auth::user();

        if ($user->role === 'ketua_rt' && !($mustahik->id_RT == $user->id_RT || $mustahik->pembuatData_id == $user->id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk mengubah data mustahik ini.');
        }

        $data = $request->validated();
        if ($user->role === 'ketua_rt') {
            $data['id_RT'] = $user->id_RT;
        }

        $mustahik->update($data);

        session()->flash('success', 'Data mustahik ' . $mustahik->nama_keluarga . ' berhasil diubah');
        return redirect()->route('zakatMustahik.index');
    }

    public function destroy($id)
    {
        $mustahik = Mustahik::findOrFail($id);
        $user = Auth::user();

        if ($user->role === 'ketua_rt' && !($mustahik->id_RT == $user->id_RT || $mustahik->pembuatData_id == $user->id)) {
            abort(403, 'Anda tidak memiliki hak akses untuk menghapus data mustahik ini.');
        }

        $mustahik->delete();

        session()->flash('success', 'Data mustahik ' . $mustahik->nama_keluarga . ' berhasil dihapus');
        return redirect()->route('zakatMustahik.index');
    }

    public function pdfGenerator()
    {
        $user = Auth::user();
        $mustahiksQuery = Mustahik::with('RTWarga');

        if ($user->role === 'ketua_rt') {
            $mustahiksQuery->where(function ($query) use ($user) {
                $query->where('pembuatData_id', $user->id)
                    ->orWhere('id_RT', $user->id_RT);
            });
        }

        $mustahiks = $mustahiksQuery->get();
        $pdf = Pdf::loadView('admin.zakat.mustahik.mustahikData', compact('mustahiks'));
        return $pdf->download('data_mustahik.pdf');
    }
}
