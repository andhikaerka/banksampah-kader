<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPengaliBarangBeratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang_berat', function (Blueprint $table) {
            $table->decimal('pengali', 8, 5)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('barang_berat', 'pengali')) //check the column
        {
            Schema::table('barang_berat', function (Blueprint $table)
            {
                $table->dropColumn('pengali'); //drop it
            });
        }
    }
}
