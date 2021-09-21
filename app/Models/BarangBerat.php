<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangBerat extends Model
{
    use HasFactory;

    protected $table = "barang_berat";

    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
