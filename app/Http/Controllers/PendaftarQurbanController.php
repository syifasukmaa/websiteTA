<?php

namespace App\Http\Controllers;

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
        $jumlahUang = PendaftarQurban::sum('biaya');

        if (request('search')) {
            $qurbans->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('jenis_hewan', 'like', '%' . request('search') . '%')
                ->orWhere('hak_pengqurban', 'like', '%' . request('search') . '%')
                ->orWhere('biaya', 'like', '%' . request('search') . '%')
                ->orwhere('status_pembayaran', 'like', '%' . request('search') . '%')
                ->orWhereHas('RTWarga', function ($query) {
                    $query->where('nomor_RT', 'like', '%' . request('search') . '%');
                });
        }

        return view(
            'admin.qurban.pendaftarQurban.dashboard',
            [
                'qurbans' => $qurbans->paginate(10),
                'jumlahUang' => $jumlahUang
            ]
        );
    }
    public function kerbau()
    {
        $qurbans = PengqurbanSapi::oldest();
        $jumlahUang = PengqurbanSapi::sum('biaya');

        if (request('search')) {
            $qurbans->where('nama_satu', 'like', '%' . request('search') . '%')
                ->orWhere('jenis_hewan', 'like', '%' . request('search') . '%')
                ->orWhere('hak_pengqurban', 'like', '%' . request('search') . '%')
                ->orWhere('biaya', 'like', '%' . request('search') . '%')
                ->orwhere('status_pembayaran', 'like', '%' . request('search') . '%')
                ->orwhere('RW', 'like', '%' . request('search') . '%')
                ->orWhereHas('RTWarga', function ($query) {
                    $query->where('nomor_RT', 'like', '%' . request('search') . '%');
                });
        }
        return view('admin.qurban.kerbau.dashboard', [
            'qurbans' => $qurbans->paginate(10),
            'jumlahUang' => $jumlahUang
        ]);
    }

    public function createKerbau()
    {
        return view('admin.qurban.kerbau.create', [
            'rt' => RT::all(),
        ]);
    }
    public function storeKerbau(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama_satu' => 'required',
            'nama_dua' => 'required',
            'nama_tiga' => 'required',
            'nama_empat' => 'required',
            'nama_lima' => 'required',
            'nama_enam' => 'required',
            'nama_tujuh' => 'required',
            'pahala_satu' => 'required',
            'pahala_dua' => 'required',
            'pahala_tiga' => 'required',
            'pahala_empat' => 'required',
            'pahala_lima' => 'required',
            'pahala_enam' => 'required',
            'pahala_tujuh' => 'required',
            'jenis_hewan' => 'required',
            'hak_pengqurban' => 'required',
            'biaya' => 'required',
            'id_RT' => 'required',
            'status_pembayaran' => 'required',
        ]);

        $tahun = date('Y');
        $nomorAntrian = PengqurbanSapi::where('tahun', $tahun)->count() + 1;
        $qurban = new PengqurbanSapi();



        $qurban->tahun = $tahun;
        $qurban->nomor_antrian = $nomorAntrian;
        $qurban->nama_satu = $request->nama_satu;
        $qurban->nama_dua = $request->nama_dua;
        $qurban->nama_tiga = $request->nama_tiga;
        $qurban->nama_empat = $request->nama_empat;
        $qurban->nama_lima = $request->nama_lima;
        $qurban->nama_enam = $request->nama_enam;
        $qurban->nama_tujuh = $request->nama_tujuh;
        $qurban->pahala_satu = $request->pahala_satu;
        $qurban->pahala_dua = $request->pahala_dua;
        $qurban->pahala_tiga = $request->pahala_tiga;
        $qurban->pahala_empat = $request->pahala_empat;
        $qurban->pahala_lima = $request->pahala_lima;
        $qurban->pahala_enam = $request->pahala_enam;
        $qurban->pahala_tujuh = $request->pahala_tujuh;
        $qurban->biaya = $request->biaya;
        $qurban->id_RT = $request->id_RT;
        $qurban->jenis_hewan = $request->jenis_hewan;
        $qurban->hak_pengqurban = $request->hak_pengqurban;
        $qurban->status_pembayaran = $request->status_pembayaran;
        $qurban->pembuatData_id = Auth::id();
        $qurban->save();

        session()->flash('success', 'Data Pendaftar qurban ' . $qurban->jenis . $qurban->nama . ' ditambahkan');
        return redirect('/admin/qurban/pendaftarQurban/kerbau');
    }

    public function create()
    {
        return view('admin.qurban.pendaftarQurban.create', [
            'rt' => RT::all(),
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'jenis_hewan' => 'required',
            'tujuan_pahala' => 'required',
            'hak_pengqurban' => 'required',
            'biaya' => 'required',
            'RW' => 'required',
            'status_pembayaran' => 'required',
        ]);

        $tahun = date('Y');

        $nomorAntrian = PendaftarQurban::where('tahun', $tahun)->count() + 1;

        $qurban = new PendaftarQurban();

        $qurban->nama = $request->nama;
        $qurban->nomor_antrian = $nomorAntrian;
        $qurban->tahun = $tahun;
        $qurban->jenis_hewan = $request->jenis_hewan;
        $qurban->tujuan_pahala = $request->tujuan_pahala;
        $qurban->hak_pengqurban = $request->hak_pengqurban;
        $qurban->biaya = $request->biaya;
        $qurban->RW = $request->RW;
        $qurban->id_RT = $request->id_RT;
        $qurban->status_pembayaran = $request->status_pembayaran;
        $qurban->pembuatData_id = Auth::id();
        $qurban->save();

        session()->flash('success', 'Data Pendaftar qurban ' . $qurban->nama . ' ditambahkan');
        return redirect('/admin/qurban/pendaftarQurban');
    }
    public function detail($id)
    {
        return view('admin.qurban.pendaftarQurban.detail', [
            'qurban' => PendaftarQurban::where('id_pendaftar_qurban', $id)->first(),
            'rt' => RT::all(),
        ]);
    }

    public function detailKerbau($id)
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

    public function update(Request $request, $id)
    {
        // dd($request->RW);
        $qurban = PendaftarQurban::findOrfail($id);
        if ($qurban) {
            $qurban->update([
                'nama' => $request->nama,
                'jenis_hewan' => $request->jenis_hewan,
                'tujuan_pahala' => $request->tujuan_pahala,
                'hak_pengqurban' => $request->hak_pengqurban,
                'biaya' => $request->biaya,
                'RW' => $request->RW,
                'id_RT' => $request->id_RT,
                'status_pembayaran' => $request->status_pembayaran
            ]);
        }
        session()->flash('success', 'Data pendaftar qurban berhasil diubah');

        return redirect()->route('pendaftarQurban.index');
    }

    public function updateKerbau(Request $request, $id)
    {
        // dd($request->all());
        $qurban = PengqurbanSapi::findOrfail($id);
        if ($qurban) {
            $qurban->update([
                'nama_satu' => $request->nama_satu,
                'nama_dua' => $request->nama_dua,
                'nama_tiga' => $request->nama_tiga,
                'nama_empat' => $request->nama_empat,
                'nama_lima' => $request->nama_lima,
                'nama_enam' => $request->nama_enam,
                'nama_tujuh' => $request->nama_tujuh,
                'pahala_satu' => $request->pahala_satu,
                'pahala_dua' => $request->pahala_dua,
                'pahala_tiga' => $request->pahala_tiga,
                'pahala_empat' => $request->pahala_empat,
                'pahala_lima' => $request->pahala_lima,
                'pahala_enam' => $request->pahala_enam,
                'pahala_tujuh' => $request->pahala_tujuh,
                'hak_pengqurban' => $request->hak_pengqurban,
                'jenis_hewan' => $request->jenis_hewan,
                'biaya' => $request->biaya,
                'id_RT' => $request->id_RT,
                'status_pembayaran' => $request->status_pembayaran
            ]);
        }
        session()->flash('success', 'Data pendaftar qurban ' . $qurban->nama_satu . ' berhasil diubah');

        return redirect()->route('pendaftarQurban.kerbau');
    }

    public function delete($id)
    {
        $qurban = PendaftarQurban::findOrfail($id);
        if ($qurban) {
            $qurban->delete();
        }

        session()->flash('success', 'Data pendaftar qurban berhasil dihapus');
        return redirect()->route('pendaftarQurban.index');
    }
    public function deleteKerbau($id)
    {
        $qurban = PengqurbanSapi::findOrfail($id);
        if ($qurban) {
            $qurban->delete();
        }

        session()->flash('success', 'Data pendaftar qurban ' . $qurban->nama_satu . ' berhasil dihapus');
        return redirect()->route('pendaftarQurban.kerbau');
    }
}
