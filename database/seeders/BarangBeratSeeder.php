<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;

class BarangBeratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang_berat')->insert([
            'nama' => 'Gram',
            'pengali' => 0.001,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'created_by' => 1,
        ]);

        DB::table('barang_berat')->insert([
            'nama' => 'Ons',
            'pengali' => 0.1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'created_by' => 1,
        ]);

        DB::table('barang_berat')->insert([
            'nama' => 'KG',
            'pengali' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'created_by' => 1,
        ]);
    }
}
