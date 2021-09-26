<?php

namespace App\Models;

use App\Traits\HasCreatedUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasCreatedUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // bank sampah
    public function bank_sampah()
    {
        return $this->belongsTo(BankSampah::class, 'bank_sampah_id');
    }

    // pengguna kategori
    public function pengguna_kategori()
    {
        return $this->belongsTo(PenggunaKategori::class, 'pengguna_kategori_id');
    }

    // admin approval
    public function approved_user()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function status_hubungan()
    {
        return $this->belongsTo(KaderStatus::class, 'kader_status_id');
    }

    public function kader_kategori()
    {
        return $this->belongsTo(KaderKategori::class, 'kader_kategori_id');
    }

    public function setoran()
    {
        return $this->hasMany(KaderSetoran::class, 'created_by');
    }
}
