<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Tampilkan daftar galeri (foto dan video)
     */
    public function index(Request $request)
    {
        $tipe = $request->query('tipe'); // 'foto' atau 'video' atau null (semua)
        $search = $request->query('search');

        $query = Gallery::query();

        if ($tipe && in_array($tipe, ['foto', 'video'])) {
            $query->where('tipe', $tipe);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('keterangan', 'like', "%{$search}%");
            });
        }

        $galleries = $query->orderBy('urutan', 'asc')->latest()->paginate(12)->withQueryString();

        $fotoCount = Gallery::where('tipe', 'foto')->count();
        $videoCount = Gallery::where('tipe', 'video')->count();

        return view('admin.gallery.index', compact('galleries', 'tipe', 'search', 'fotoCount', 'videoCount'));
    }

    /**
     * Form tambah media baru
     */
    public function create(Request $request)
    {
        $tipe = $request->query('tipe', 'foto');
        if (!in_array($tipe, ['foto', 'video'])) {
            $tipe = 'foto';
        }

        return view('admin.gallery.create', compact('tipe'));
    }

    /**
     * Simpan media baru
     */
    public function store(Request $request)
    {
        $tipe = $request->input('tipe', 'foto');

        if ($tipe === 'foto') {
            $validated = $request->validate([
                'judul' => ['required', 'string', 'max:255'],
                'tipe' => ['required', 'in:foto,video'],
                'foto' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
                'keterangan' => ['nullable', 'string', 'max:1000'],
                'urutan' => ['nullable', 'integer', 'min:0'],
            ], [
                'judul.required' => 'Judul foto wajib diisi.',
                'foto.required' => 'File foto wajib diunggah.',
                'foto.image' => 'File yang diunggah harus berupa gambar.',
                'foto.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, webp.',
                'foto.max' => 'Ukuran gambar maksimal adalah 5MB.',
            ]);

            $path = $request->file('foto')->store('galeri', 'public');

            Gallery::create([
                'judul' => $validated['judul'],
                'tipe' => 'foto',
                'file_path' => $path,
                'keterangan' => $validated['keterangan'] ?? null,
                'urutan' => $validated['urutan'] ?? 0,
            ]);

            session()->flash('success', 'Foto baru berhasil ditambahkan ke galeri.');
        } else {
            $validated = $request->validate([
                'judul' => ['required', 'string', 'max:255'],
                'tipe' => ['required', 'in:foto,video'],
                'youtube_url' => ['required', 'url', 'max:500'],
                'keterangan' => ['nullable', 'string', 'max:1000'],
                'urutan' => ['nullable', 'integer', 'min:0'],
            ], [
                'judul.required' => 'Judul video wajib diisi.',
                'youtube_url.required' => 'Link YouTube wajib diisi.',
                'youtube_url.url' => 'Format link YouTube tidak valid.',
            ]);

            // Cek apakah link YouTube valid dan bisa diambil ID-nya
            $dummy = new Gallery(['youtube_url' => $validated['youtube_url']]);
            if (!$dummy->youtube_id) {
                return back()->withInput()->withErrors([
                    'youtube_url' => 'Link YouTube tidak valid. Gunakan format seperti https://www.youtube.com/watch?v=xxxx atau https://youtu.be/xxxx'
                ]);
            }

            Gallery::create([
                'judul' => $validated['judul'],
                'tipe' => 'video',
                'youtube_url' => $validated['youtube_url'],
                'keterangan' => $validated['keterangan'] ?? null,
                'urutan' => $validated['urutan'] ?? 0,
            ]);

            session()->flash('success', 'Video YouTube baru berhasil ditambahkan ke galeri.');
        }

        return redirect()->route('admin.gallery.index', ['tipe' => $tipe]);
    }

    /**
     * Form edit media
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update media
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->tipe === 'foto') {
            $validated = $request->validate([
                'judul' => ['required', 'string', 'max:255'],
                'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
                'keterangan' => ['nullable', 'string', 'max:1000'],
                'urutan' => ['nullable', 'integer', 'min:0'],
            ], [
                'judul.required' => 'Judul foto wajib diisi.',
                'foto.image' => 'File yang diunggah harus berupa gambar.',
                'foto.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, webp.',
                'foto.max' => 'Ukuran gambar maksimal adalah 5MB.',
            ]);

            $data = [
                'judul' => $validated['judul'],
                'keterangan' => $validated['keterangan'] ?? null,
                'urutan' => $validated['urutan'] ?? 0,
            ];

            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada di storage
                if ($gallery->file_path && Storage::disk('public')->exists($gallery->file_path)) {
                    Storage::disk('public')->delete($gallery->file_path);
                }
                $data['file_path'] = $request->file('foto')->store('galeri', 'public');
            }

            $gallery->update($data);
            session()->flash('success', 'Foto galeri berhasil diperbarui.');
        } else {
            $validated = $request->validate([
                'judul' => ['required', 'string', 'max:255'],
                'youtube_url' => ['required', 'url', 'max:500'],
                'keterangan' => ['nullable', 'string', 'max:1000'],
                'urutan' => ['nullable', 'integer', 'min:0'],
            ], [
                'judul.required' => 'Judul video wajib diisi.',
                'youtube_url.required' => 'Link YouTube wajib diisi.',
                'youtube_url.url' => 'Format link YouTube tidak valid.',
            ]);

            $dummy = new Gallery(['youtube_url' => $validated['youtube_url']]);
            if (!$dummy->youtube_id) {
                return back()->withInput()->withErrors([
                    'youtube_url' => 'Link YouTube tidak valid. Gunakan format seperti https://www.youtube.com/watch?v=xxxx atau https://youtu.be/xxxx'
                ]);
            }

            $gallery->update([
                'judul' => $validated['judul'],
                'youtube_url' => $validated['youtube_url'],
                'keterangan' => $validated['keterangan'] ?? null,
                'urutan' => $validated['urutan'] ?? 0,
            ]);

            session()->flash('success', 'Data video YouTube berhasil diperbarui.');
        }

        return redirect()->route('admin.gallery.index', ['tipe' => $gallery->tipe]);
    }

    /**
     * Hapus media
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $tipe = $gallery->tipe;

        // Hapus file foto dari storage jika bertipe foto
        if ($gallery->tipe === 'foto' && $gallery->file_path && Storage::disk('public')->exists($gallery->file_path)) {
            Storage::disk('public')->delete($gallery->file_path);
        }

        $gallery->delete();

        session()->flash('success', 'Media galeri berhasil dihapus.');
        return redirect()->route('admin.gallery.index', ['tipe' => $tipe]);
    }
}
