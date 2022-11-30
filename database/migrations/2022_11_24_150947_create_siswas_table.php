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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jurusan');
            $table->string('agama');
            $table->string('pkn');
            $table->string('bhs_indo');
            $table->string('matematika');
            $table->string('ipa');
            $table->string('ips');
            $table->string('bhs_inggris');
            $table->string('seni_budaya');
            $table->string('penjas');
            $table->string('prakarya');
            $table->string('bhs_daerah');
            $table->year('angkatan');
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
        Schema::dropIfExists('siswas');
    }
};
