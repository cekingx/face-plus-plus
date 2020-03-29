<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendatang extends Model
{
    protected $fillable = [
        'nik', 
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'gol_darah',
        'kabupaten',
        'kecamatan',
        'desa',
        'alamat',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'kewarganegaraan', 
        'face_token'
    ];

    public function riwayat() {
        return $this->hasMany('App\RiwayatTinggal');
    }
}
