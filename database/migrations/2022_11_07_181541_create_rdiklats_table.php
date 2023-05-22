<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdiklatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdiklats', function (Blueprint $table) {
            $table->id();
            $table->string('Judul');
            $table->string('Pelaks');
            $table->string('Vendor');
            $table->integer('JmlPes');
            $table->date('WktM');
            $table->date('WktK');
            $table->string('Bidang');
            $table->integer('BiayaD');
            $table->integer('BiayaS');
            $table->integer('BTotal');
            $table->integer('PerPem');
            $table->integer('HargPen');
            $table->string('Tahun');
            $table->string('Peserta');
            $table->string('Status');
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
        Schema::dropIfExists('rdiklats');
    }
}
