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

    public function setoran_plastik()
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

    public function setoran_non_plastik()
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

    public function kader()
    {
        return $this->hasMany(User::class, 'bank_sampah_id', 'id');
    }

    public function kaderisasi()
    {
        return $this->hasMany(User::class, 'bank_sampah_id', 'id');
    }

    public function nasabah()
    {
        return $this->hasMany(User::class, 'bank_sampah_id', 'id');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'province_id', 'id');
    }

    public function kabupaten_kota()
    {
        return $this->belongsTo(KabupatenKota::class, 'city_id', 'id');
    }
}
