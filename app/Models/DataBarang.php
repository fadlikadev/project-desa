<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    protected $table = 'data_barangs';
    protected $guarded = ['id'];

    public function pinjamans()
    {
        return $this->hasMany(DataPeminjamanBarang::class, 'data_barang_id');
    }
}
