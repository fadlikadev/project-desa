<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPeminjamanBarang extends Model
{
    protected $table = 'data_peminjaman_barangs';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function barang()
    {
        return $this->belongsTo(DataBarang::class, 'data_barang_id');
    }
}
