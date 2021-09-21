<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaderStatus extends Model
{
    use HasFactory;

    protected $table = "kader_status";

    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
