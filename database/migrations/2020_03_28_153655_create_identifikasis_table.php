<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identifikasis', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 50);
            $table->string('face_token1', 50);
            $table->string('comparator_nik', 50);
            $table->string('face_token2', 50);
            $table->decimal('confidence', 5, 3);
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
        Schema::dropIfExists('identifikasis');
    }
}
