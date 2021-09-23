<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\BankSampah
 *
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $created_by
 * @property-read \App\Models\User $created_user
 * @method static \Illuminate\Database\Eloquent\Builder|BankSampah newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankSampah newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BankSampah query()
 * @method static \Illuminate\Database\Eloquent\Builder|BankSampah whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankSampah whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankSampah whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankSampah whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BankSampah whereUpdatedAt($value)
 */
	class BankSampah extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Barang
 *
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $created_by
 * @property int $kategori_id
 * @property-read \App\Models\User $created_user
 * @property-read \App\Models\BarangKategori $kategori
 * @method static \Illuminate\Database\Eloquent\Builder|Barang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereUpdatedAt($value)
 */
	class Barang extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BarangBerat
 *
 * @property int $id
 * @property string $nama
 * @property string $pengali
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $created_by
 * @property-read \App\Models\User $created_user
 * @method static \Illuminate\Database\Eloquent\Builder|BarangBerat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangBerat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangBerat query()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangBerat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangBerat whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangBerat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangBerat whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangBerat wherePengali($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangBerat whereUpdatedAt($value)
 */
	class BarangBerat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BarangKategori
 *
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $created_by
 * @property-read \App\Models\User $created_user
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKategori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKategori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKategori query()
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKategori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKategori whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKategori whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKategori whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BarangKategori whereUpdatedAt($value)
 */
	class BarangKategori extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\KaderKategori
 *
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $created_by
 * @property-read \App\Models\User $created_user
 * @method static \Illuminate\Database\Eloquent\Builder|KaderKategori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KaderKategori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KaderKategori query()
 * @method static \Illuminate\Database\Eloquent\Builder|KaderKategori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KaderKategori whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KaderKategori whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KaderKategori whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KaderKategori whereUpdatedAt($value)
 */
	class KaderKategori extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\KaderSetoran
 *
 * @property int $id
 * @property int $barang_id
 * @property string $jumlah
 * @property int $berat_satuan_id
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang $barang
 * @property-read \App\Models\BarangBerat $barang_berat
 * @property-read \App\Models\User $created_user
 * @method static \Illuminate\Database\Eloquent\Builder|KaderSetoran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KaderSetoran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KaderSetoran query()
 * @method static \Illuminate\Database\Eloquent\Builder|KaderSetoran whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KaderSetoran whereBeratSatuanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KaderSetoran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KaderSetoran whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KaderSetoran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KaderSetoran whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KaderSetoran whereUpdatedAt($value)
 */
	class KaderSetoran extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\KaderStatus
 *
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $created_by
 * @property-read \App\Models\User $created_user
 * @method static \Illuminate\Database\Eloquent\Builder|KaderStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KaderStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KaderStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|KaderStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KaderStatus whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KaderStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KaderStatus whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KaderStatus whereUpdatedAt($value)
 */
	class KaderStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PenggunaKategori
 *
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $created_by
 * @property-read \App\Models\User $created_user
 * @method static \Illuminate\Database\Eloquent\Builder|PenggunaKategori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PenggunaKategori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PenggunaKategori query()
 * @method static \Illuminate\Database\Eloquent\Builder|PenggunaKategori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PenggunaKategori whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PenggunaKategori whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PenggunaKategori whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PenggunaKategori whereUpdatedAt($value)
 */
	class PenggunaKategori extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $created_by
 * @property string|null $jenis_kelamin
 * @property string|null $tanggal_lahir
 * @property string|null $alamat
 * @property string|null $telepon
 * @property string|null $photo
 * @property int|null $province_id
 * @property int|null $city_id
 * @property int|null $district_id
 * @property int|null $village_id
 * @property string|null $kode_pos
 * @property int|null $bank_sampah_id
 * @property int|null $pengguna_kategori_id
 * @property int|null $pengguna_profile_status
 * @property string|null $approved_at
 * @property int|null $approved_by
 * @property string|null $approval_status
 * @property int|null $kader_status_id
 * @property int|null $kader_kategori_id
 * @property-read User|null $approved_user
 * @property-read \App\Models\BankSampah|null $bank_sampah
 * @property-read User|null $created_user
 * @property-read \App\Models\KaderKategori|null $kader_kategori
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\PenggunaKategori|null $pengguna_kategori
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\KaderSetoran[] $setoran
 * @property-read int|null $setoran_count
 * @property-read \App\Models\KaderStatus|null $status_hubungan
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApprovalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankSampahId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKaderKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKaderStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKodePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePenggunaKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePenggunaProfileStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVillageId($value)
 */
	class User extends \Eloquent {}
}

