<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Duafa extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_duafa';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'nama_istri',
        'nama_suami',
        'status',
        'jumlah_uang',
        'keterangan',
        'penerimaan',
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
