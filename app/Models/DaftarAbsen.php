<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;

class DaftarAbsen extends Model
{
    use HasFactory;

    protected $table='daftar_absen';

    protected $fillable = [
        'absen_id',
        'siswa_id',
        'hadir',
        'jam'
    ];

    public function siswa() {
        return $this->belongsToMany(Siswa::class);
    }
}
