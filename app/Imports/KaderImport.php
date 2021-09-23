<?php

namespace App\Imports;

use App\Models\User;
use DB;
use Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class KaderImport implements 
    ToModel, 
    WithHeadingRow, 
    SkipsEmptyRows,
    SkipsOnError,
    SkipsOnFailure,
    WithValidation
{
    use 
    Importable, 
    SkipsFailures, 
    SkipsErrors;

    public $userList;

    public function  __construct($created_user_id, $bank_sampah_id, $kader_kategori_id)
    {
        $this->created_user_id = $created_user_id;
        $this->bank_sampah_id = $bank_sampah_id;
        $this->kader_kategori_id = $kader_kategori_id;

        $this->userList = collect();
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user  = new User();
        $user->name = $row['nama'];
        $user->email = $row['email'];
        $user->telepon = $row['telepon'];
        $user->alamat = $row['alamat'];
        $user->created_by = $this->created_user_id;
        $user->bank_sampah_id = $this->bank_sampah_id;
        $user->kader_kategori_id = $this->kader_kategori_id;
        $user->password = Hash::make($row['telepon']);

        $user->save();
        
        // assign role-nya
        $user->assignRole('kader');

        // collect user
        $this->userList->push($user);

        return $user;
    }

    /**
     * validation
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string',
            'email' => 'required|email|unique:users,email',
        ];
    }
}
