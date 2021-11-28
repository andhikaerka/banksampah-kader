<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBankSampahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bank_sampah', function (Blueprint $table) {
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();

            $table->foreign('city_id')
                ->references('id')
                ->on('indonesia_cities');

            $table->foreign('province_id')
                ->references('id')
                ->on('indonesia_provinces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank_sampah', function (Blueprint $table) {
            $table->dropForeign('bank_sampah_province_id_foreign');
            $table->dropForeign('bank_sampah_city_id_foreign');

            $table->dropColumn('province_id');
            $table->dropColumn('city_id');
        });
    }
}
