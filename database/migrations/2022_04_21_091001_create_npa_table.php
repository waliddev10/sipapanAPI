<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNpaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('npa', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->bigInteger('volume_min')->unsigned(true)->nullable();
            $table->bigInteger('volume_max')->unsigned(true)->nullable();
            $table->float('nilai', 15, 2)->unsigned(true);
            $table->string('jenis_usaha_id', 36);
            $table->date('tgl_berlaku');
            $table->string('keterangan');
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
        Schema::dropIfExists('npa');
    }
};
