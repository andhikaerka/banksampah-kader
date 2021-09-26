<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable()->unique();
            $table->text('photo')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('village_id')->nullable();
            $table->string('kode_pos')->nullable();
            $table->unsignedBigInteger('bank_sampah_id')->nullable();
            $table->unsignedBigInteger('pengguna_kategori_id')->nullable();

            $table->foreign('village_id')
                ->references('id')
                ->on('indonesia_villages');

            $table->foreign('district_id')
                ->references('id')
                ->on('indonesia_districts');

            $table->foreign('city_id')
                ->references('id')
                ->on('indonesia_cities');

            $table->foreign('province_id')
                ->references('id')
                ->on('indonesia_provinces');

            $table->foreign('bank_sampah_id')
                ->references('id')
                ->on('bank_sampah');

            $table->foreign('pengguna_kategori_id')
                ->references('id')
                ->on('pengguna_kategori');

            $table->foreign('created_by')
                ->references('id')
                ->on('users');
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

            $table->dropForeign('users_created_by_foreign');
            $table->dropForeign('users_province_id_foreign');
            $table->dropForeign('users_city_id_foreign');
            $table->dropForeign('users_district_id_foreign');
            $table->dropForeign('users_village_id_foreign');
            $table->dropForeign('users_bank_sampah_id_foreign');
            $table->dropForeign('users_pengguna_kategori_id_foreign');

            $table->dropColumn('created_by');
            $table->dropColumn('province_id');
            $table->dropColumn('city_id');
            $table->dropColumn('district_id');
            $table->dropColumn('village_id');
            $table->dropColumn('bank_sampah_id');
            $table->dropColumn('pengguna_kategori_id');
            $table->dropColumn('jenis_kelamin');
            $table->dropColumn('tanggal_lahir');
            $table->dropColumn('alamat');
            $table->dropColumn('telepon');
            $table->dropColumn('photo');
            $table->dropColumn('kode_pos');
        });
    }
}
