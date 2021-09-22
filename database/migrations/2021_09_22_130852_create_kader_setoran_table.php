<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaderSetoranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kader_setoran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->decimal('jumlah', 16, 8);
            $table->unsignedBigInteger('berat_satuan_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            $table->foreign('barang_id')
                ->references('id')
                ->on('barang');

            $table->foreign('berat_satuan_id')
                ->references('id')
                ->on('barang_berat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kader_setoran');
    }
}
