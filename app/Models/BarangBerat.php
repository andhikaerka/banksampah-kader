<?php

namespace App\Models;

use App\Traits\HasCreatedUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangBerat extends Model
{
    use HasFactory, HasCreatedUser;

    protected $table = "barang_berat";
}
