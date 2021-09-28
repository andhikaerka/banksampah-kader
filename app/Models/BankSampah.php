<?php

namespace App\Models;

use App\Traits\HasCreatedUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSampah extends Model
{
    use HasFactory, HasCreatedUser;

    protected $table = "bank_sampah";

    public function setoran()
    {
        return $this->hasManyThrough(
        KaderSetoran::class,
        User::class,
        'bank_sampah_id', // Foreign key on the user table...
        'created_by', // Foreign key on the setoran table...
        'id', // Local key on the bank sampah table...
        'id' // Local key on the users table...
        );
    }
}
