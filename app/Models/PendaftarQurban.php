<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;


class PendaftarQurban extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pendaftar_qurban';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'tujuan_pahala',
        'hak_pengqurban',
        'jenis_hewan',
        'biaya',
        'status_pembayaran',
        'pembuatData_id',
        'id_RT',
        'RW'
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
