<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class RT extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_RT';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nomor_rt',
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

    public function muzakki(): HasMany
    {
        return $this->hasMany(Muzakki::class);
    }
}
