<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKategori extends Model
{
    use HasFactory;

    protected $table = "barang_kategori";

    public function created_user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}
