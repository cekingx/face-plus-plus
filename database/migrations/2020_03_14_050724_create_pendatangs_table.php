<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendatangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendatangs', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 20);
            $table->string('nama', 50);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->enum('gol_darah', ['a', 'b', 'ab', 'o']);
            $table->text('alamat');
            $table->string('agama', 50);
            $table->enum('status_perkawinan', ['kawin', 'belum_kawin']);
            $table->string('pekerjaan', 50);
            $table->string('kewarganegaraan', 10);
            $table->string('face_token', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendatangs');
    }
}
