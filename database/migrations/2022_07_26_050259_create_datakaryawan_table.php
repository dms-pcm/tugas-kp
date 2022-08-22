<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatakaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('attachment')->nullable();
            $table->string('attachment_sampul')->nullable();
            // $table->string('no_induk');
            // $table->string('email');
            // $table->string('no_telp');
            // $table->string('jabatan');
            $table->string('jenis_jabatan');
            $table->string('bio',500)->nullable();
            // $table->string('alamat');
            // $table->string('provinsi');
            // $table->string('kode_pos');
            // $table->string('negara');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_karyawan');
    }
}
