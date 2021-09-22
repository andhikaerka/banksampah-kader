<?php

namespace App\Imports;

use App\Models\User;
use DB;
use Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KaderImport implements ToModel, WithHeadingRow
{
    public function  __construct($created_user_id)
    {
        $this->created_user_id = $created_user_id;
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
        $user->password = Hash::make($row['telepon']);

        $user->save();
        
        // assign role-nya
        $user->assignRole('kader');

        return $user;
    }
}
