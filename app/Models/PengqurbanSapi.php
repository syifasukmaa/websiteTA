<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class PengqurbanSapi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pengqurban_sapi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama_satu',
        'nama_dua',
        'nama_tiga',
        'nama_empat',
        'nama_lima',
        'nama_enam',
        'nama_tujuh',
        'pahala_satu',
        'pahala_dua',
        'pahala_tiga',
        'pahala_empat',
        'pahala_lima',
        'pahala_enam',
        'pahala_tujuh',
        'hak_pengqurban',
        'jenis_hewan',
        'biaya',
        'status_pembayaran',
        'pembuatData_id',
        'id_RT'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function RTWarga(): BelongsTo
    {
        return $this->belongsTo(RT::class, 'id_RT', 'id_RT');
    }

    public function pembuatData(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pembuatData_id', 'id');
    }
}
