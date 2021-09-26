<?php

namespace App\Repositories;

use App\Repositories\KaderRepositoryInterface;
use App\Models\User;
use Hash;

class KaderRepository implements KaderRepositoryInterface
{
    /**
     * Insert Data to DB
     *
     * @param array $request
     * @return void
     */
    public function save(array $request)
    {
        $kader = new User();
        $kader->name = $request['nama'];
        $kader->email = $request['email'];
        $kader->telepon = $request['telepon'];
        $kader->alamat = $request['alamat'];
        $kader->password = Hash::make($request['telepon']);
        $kader->kader_status_id = $request['status_hubungan'] ?? null;
        $kader->kader_kategori_id = auth()->user()->kader_kategori_id;
        $kader->bank_sampah_id = auth()->user()->bank_sampah_id;
        $kader->created_by = auth()->user()->id;

        $kader->save();

        return $kader;
    }

    /**
     * Update Data
     *
     * @param [type] $request
     * @param [type] $id
     * @return void
     */
    public function update(array $request, $id)
    {
        $kader = User::find($id);
        $kader->name = $request['nama'];
        $kader->email = $request['email'];
        $kader->telepon = $request['telepon'];
        $kader->alamat = $request['alamat'];
        $kader->kader_status_id = $request['status_hubungan'] ?? null;

        $kader->save();

        return $kader;
    }

    /**
     * Delete Data
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        $kader = User::find($id);

        return $kader->delete();
    }
}
