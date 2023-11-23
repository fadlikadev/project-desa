<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPeminjamanFasilitas extends Model
{
    protected $table = 'data_peminjaman_fasilitases';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function fasilitas()
    {
        return $this->belongsTo(DataFasilitas::class, 'data_fasilitas_id');
    }
}
