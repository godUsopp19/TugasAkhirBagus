<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertifikatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertifikats', function (Blueprint $table) {
            $table->id('id_s');
            $table->string('NamaK');
            $table->string('Judul');
            $table->string('Lembaga');
            $table->string('Fungsi');
            $table->string('NoSertif');
            $table->date('TglSertif');
            $table->date('Deadline');
            $table->string('Em1');
            $table->string('Em2');

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
        Schema::dropIfExists('sertifikats');
    }
}
