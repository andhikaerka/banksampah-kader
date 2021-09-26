<?php

namespace App\Models;

use App\Traits\HasCreatedUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaderSetoran extends Model
{
    use HasFactory, HasCreatedUser;

    protected $table = "kader_setoran";

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function barang_berat()
    {
        return $this->belongsTo(BarangBerat::class, 'berat_satuan_id');
    }
}
