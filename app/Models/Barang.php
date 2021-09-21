<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = "barang";

    public function created_user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Models\BarangKategori', 'kategori_id');
    }
}
