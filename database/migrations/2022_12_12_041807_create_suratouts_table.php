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
        Schema::create('suratouts', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('nomor_surat',277);
            $table->string('keterangan');
            $table->string('tujuan');
            $table->date('tgl');
            $table->string('pembuat');
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
        Schema::dropIfExists('suratouts');
    }
};
