<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'tipe',
        'file_path',
        'youtube_url',
        'keterangan',
        'urutan',
    ];

    /**
     * Ekstrak YouTube Video ID dari berbagai format link YouTube
     */
    public function getYoutubeIdAttribute(): ?string
    {
        if (!$this->youtube_url) {
            return null;
        }

        if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=|shorts\/))([\w-]{11})/', $this->youtube_url, $matches)) {
            return $matches[1];
        }

        return null;
    }

    /**
     * Dapatkan URL Embed YouTube untuk iframe
     */
    public function getYoutubeEmbedUrlAttribute(): ?string
    {
        $id = $this->youtube_id;
        return $id ? "https://www.youtube.com/embed/{$id}" : null;
    }

    /**
     * Dapatkan thumbnail YouTube
     */
    public function getYoutubeThumbnailAttribute(): ?string
    {
        $id = $this->youtube_id;
        return $id ? "https://img.youtube.com/vi/{$id}/hqdefault.jpg" : null;
    }

    /**
     * Dapatkan URL file foto
     */
    public function getImageUrlAttribute(): ?string
    {
        if (!$this->file_path) {
            return null;
        }

        return asset('storage/' . $this->file_path);
    }
}
