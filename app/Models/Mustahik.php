<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;


class Mustahik extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_mustahik';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama_keluarga',
        'kelompok',
        'nama_suami',
        'nama_istri',
        'alamat',
        'nomor_hp',
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

    public function pembuatData(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pembuatData_id');
    }
}
