<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserKaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('kader_status_id')->nullable();
            $table->unsignedBigInteger('kader_kategori_id')->nullable();

            $table->foreign('kader_status_id')
                ->references('id')
                ->on('kader_status');

            $table->foreign('kader_kategori_id')
                ->references('id')
                ->on('kader_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('kader_status_hubungan');
            $table->dropColumn('kader_kategori');
        });
    }
}
