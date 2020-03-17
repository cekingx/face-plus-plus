<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatTinggal extends Model
{
    protected $fillable = ['pendatang_id', 'riwayat_tinggal'];

    public function pendatang() {
        return $this->belongsTo('App\Pendatang');
    }
}
