<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWarga extends Model
{
    use HasFactory;

    protected $table = 'data_warga';

    protected $fillable = [
        'user_id',
        'nik',
        'no_kk',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
