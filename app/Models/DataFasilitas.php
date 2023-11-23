<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataFasilitas extends Model
{
    protected $table = 'data_fasilitases';
    protected $guarded = ['id'];

    public function pinjamans()
    {
        return $this->hasMany(DataPeminjamanFasilitas::class, 'data_fasilitas_id');
    }
}
