<?php

namespace App\Models;

use App\Traits\HasCreatedUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory, HasCreatedUser;

    protected $table = "barang";

    public function kategori()
    {
        return $this->belongsTo('App\Models\BarangKategori', 'kategori_id');
    }
}
