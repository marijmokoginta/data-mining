<?php

use Carbon\Carbon;
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
            $table->double('agama');
            $table->double('pkn');
            $table->double('bhs_indo');
            $table->double('matematika');
            $table->double('ipa');
            $table->double('ips');
            $table->double('bhs_inggris');
            $table->double('seni_budaya');
            $table->double('penjas');
            $table->double('prakarya');
            $table->double('bhs_daerah');
            $table->year('angkatan')->default(Carbon::now()->format('y'));
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
