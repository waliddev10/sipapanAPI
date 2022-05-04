<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->string('id', 36)->primary();    // uuid v4
            $table->string('nama');                 // nama administrator
            $table->string('nip', 18);              // nip administrator
            $table->string('jabatan');              // jabatan admin
            $table->string('email')->unique();      // alamat email harus unik
            $table->string('password');             // password
            $table->rememberToken();                // remember_token (belum berfungsi)
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
        Schema::dropIfExists('users');
    }
};
