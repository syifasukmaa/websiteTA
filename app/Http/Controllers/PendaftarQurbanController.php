<?php

namespace App\Http\Controllers;

use App\Http\Requests\PendaftarQurbanRequest;
use App\Http\Requests\PengqurbanSapiRequest;
use App\Models\PendaftarQurban;
use App\Models\PengqurbanSapi;
use App\Models\RT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PendaftarQurbanController extends Controller
{
    public function index()
    {
        $qurbans = PendaftarQurban::oldest();
        $totalCost = PendaftarQurban::sum('biaya');

        if (request('search')) {
            $search = request('search');
            $qurbans->where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('jenis_hewan', 'like', '%' . $search . '%')
                    ->orWhere('hak_pengqurban', 'like', '%' . $search . '%')
                    ->orWhere('biaya', 'like', '%' . $search . '%')
                    ->orwhere('status_pembayaran', 'like', '%' . $search . '%')
                    ->orWhereHas('RTWarga', function ($q) use ($search) {
                        $q->where('nomor_RT', 'like', '%' . $search . '%');
                    });
            });
        }

        return view(
            'admin.qurban.pendaftarQurban.dashboard',
            [
                'qurbans' => $qurbans->paginate(10),
                'totalCost' => $totalCost
            ]
        );
    }
    public function kerbau()
    {
        $qurbans = PengqurbanSapi::oldest();
        $totalCost = PengqurbanSapi::sum('biaya');

        if (request('search')) {
            $search = request('search');
            $qurbans->where(function ($query) use ($search) {
                $query->where('nama_satu', 'like', '%' . $search . '%')
                    ->orWhere('jenis_hewan', 'like', '%' . $search . '%')
                    ->orWhere('hak_pengqurban', 'like', '%' . $search . '%')
                    ->orWhere('biaya', 'like', '%' . $search . '%')
                    ->orwhere('status_pembayaran', 'like', '%' . $search . '%')
                    ->orwhere('RW', 'like', '%' . $search . '%')
                    ->orWhereHas('RTWarga', function ($q) use ($search) {
                        $q->where('nomor_RT', 'like', '%' . $search . '%');
                    });
            });
        }
        return view('admin.qurban.kerbau.dashboard', [
            'qurbans' => $qurbans->paginate(10),
            'totalCost' => $totalCost
        ]);
    }

    public function createKerbau()
    {
        return view('admin.qurban.kerbau.create', [
            'rt' => RT::all(),
        ]);
    }
    public function storeKerbau(PengqurbanSapiRequest $request)
    {
        $tahun = date('Y');
        $nomorAntrian = PengqurbanSapi::where('tahun', $tahun)->count() + 1;

        $data = array_merge($request->validated(), [
            'tahun' => $tahun,
            'nomor_antrian' => $nomorAntrian,
            'pembuatData_id' => Auth::id(),
        ]);

        $qurban = PengqurbanSapi::create($data);

        session()->flash('success', 'Data Pendaftar qurban ' . $qurban->nama_satu . ' ditambahkan');
        return redirect('/admin/qurban/pendaftarQurban/kerbau');
    }

    public function create()
    {
        return view('admin.qurban.pendaftarQurban.create', [
            'rt' => RT::all(),
        ]);
    }

    public function store(PendaftarQurbanRequest $request)
    {
        $tahun = date('Y');
        $nomorAntrian = PendaftarQurban::where('tahun', $tahun)->count() + 1;

        $data = array_merge($request->validated(), [
            'tahun' => $tahun,
            'nomor_antrian' => $nomorAntrian,
            'pembuatData_id' => Auth::id(),
        ]);

        $qurban = PendaftarQurban::create($data);

        session()->flash('success', 'Data Pendaftar qurban ' . $qurban->nama . ' ditambahkan');
        return redirect('/admin/qurban/pendaftarQurban');
    }
    public function show($id)
    {
        return view('admin.qurban.pendaftarQurban.detail', [
            'qurban' => PendaftarQurban::where('id_pendaftar_qurban', $id)->first(),
            'rt' => RT::all(),
        ]);
    }

    public function showKerbau($id)
    {
        return view('admin.qurban.kerbau.detail', [
            'qurban' => PengqurbanSapi::where('id_pengqurban_sapi', $id)->first(),
            'rt' => RT::all(),
        ]);
    }

    public function edit($id)
    {
        return view('admin.qurban.pendaftarQurban.edit', [
            'qurban' => PendaftarQurban::where('id_pendaftar_qurban', $id)->first(),
            'rt' => RT::all(),
        ]);
    }

    public function editKerbau($id)
    {
        return view('admin.qurban.kerbau.edit', [
            'qurban' => PengqurbanSapi::where('id_pengqurban_sapi', $id)->first(),
            'rt' => RT::all(),
        ]);
    }

    public function update(PendaftarQurbanRequest $request, $id)
    {
        $qurban = PendaftarQurban::findOrFail($id);
        $qurban->update($request->validated());

        session()->flash('success', 'Data pendaftar qurban berhasil diubah');
        return redirect()->route('pendaftarQurban.index');
    }

    public function updateKerbau(PengqurbanSapiRequest $request, $id)
    {
        $qurban = PengqurbanSapi::findOrFail($id);
        $qurban->update($request->validated());

        session()->flash('success', 'Data pendaftar qurban ' . $qurban->nama_satu . ' berhasil diubah');
        return redirect()->route('pendaftarQurban.kerbau');
    }

    public function destroy($id)
    {
        $qurban = PendaftarQurban::findOrFail($id);
        $qurban->delete();

        session()->flash('success', 'Data pendaftar qurban berhasil dihapus');
        return redirect()->route('pendaftarQurban.index');
    }
    public function destroyKerbau($id)
    {
        $qurban = PengqurbanSapi::findOrFail($id);
        $qurban->delete();

        session()->flash('success', 'Data pendaftar qurban ' . $qurban->nama_satu . ' berhasil dihapus');
        return redirect()->route('pendaftarQurban.kerbau');
    }
}
