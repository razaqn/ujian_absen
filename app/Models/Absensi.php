<?php

namespace App\Models;

use App\Models\Mapel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $fillable = [
        'mapel_id',
        'name',
        'waktu_absen',
    ];

    public function mapel() {
        return $this->belongsTo(Mapel::class);
    }
}
