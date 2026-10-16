<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman utama (landing page)
     */
    public function index()
    {
        $galleryPhotos = Gallery::where('tipe', 'foto')
            ->orderBy('urutan', 'asc')
            ->latest()
            ->get();

        $galleryVideos = Gallery::where('tipe', 'video')
            ->orderBy('urutan', 'asc')
            ->latest()
            ->get();

        return view('welcome', compact('galleryPhotos', 'galleryVideos'));
    }
}
