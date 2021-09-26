<?php

namespace App\Models;

use App\Traits\HasCreatedUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaKategori extends Model
{
    use HasFactory, HasCreatedUser;

    protected $table = "pengguna_kategori";
}
