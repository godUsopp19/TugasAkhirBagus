<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdiklatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdiklats', function (Blueprint $table) {
            $table->id('id_P');
            $table->string('Program');
            $table->string('Tujuan');
            $table->string('Prioritas');
            $table->date('WktP');
            $table->date('WktS');
            $table->string('Vendor');
            $table->integer('JmlP');
            $table->string('RenP');
            $table->string('Bidang');
            $table->integer('HargSat');
            $table->integer('SPPD');
            $table->integer('Total');
            $table->integer('HargPen');
            $table->integer('Totals');
            $table->string('PermPemb');
            $table->date('LM');
            $table->string('Tahun');
            $table->string('Peserta');
            $table->string('Approval');
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
        Schema::dropIfExists('pdiklats');
    }
}
