<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratins', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat',277);
            $table->string('dari_klien');
            $table->date('tgl_surat');
            $table->date('tgl_terima');
            $table->string('penerima');
            $table->string('deskripsi');
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
        Schema::dropIfExists('suratins');
    }
};
