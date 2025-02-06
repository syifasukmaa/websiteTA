<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;


class Muzakki extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_muzakki';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama_muzakki',
        'jumlah_jiwa',
        'beras',
        'uang',
        'infaq',
        'alamat',
        'keterangan',
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

    public function penerimaZakat(): BelongsTo
    {
        return $this->belongsTo(User::class, 'penerima_id', 'id');
    }
}
