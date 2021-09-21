<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSampah extends Model
{
    use HasFactory;

    protected $table = "bank_sampah";

    public function created_user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}
