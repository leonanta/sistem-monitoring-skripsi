<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBimbinganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bimbingan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_semester');
            $table->foreign('id_semester')->references('id')->on('semester');
            $table->string('nim', 15);
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->unsignedBigInteger('id_proposal');
            $table->foreign('id_proposal')->references('id')->on('proposal');
            $table->unsignedBigInteger('id_plot_dosbing');
            $table->foreign('id_plot_dosbing')->references('id')->on('plot_dosbing');
            $table->string('bimbingan_ke', 5);
            // $table->string('bab');
            $table->string('file');
            $table->text('komentar')->nullable();
            $table->enum('ket1', ['Review', 'Ok', 'Lanjut ke bimbingan selanjutnya', 'Siap ujian'])->default('Review');
            $table->enum('ket2', ['Review', 'Ok', 'Lanjut ke bimbingan selanjutnya', 'Siap ujian'])->default('Review');
            $table->string('bimbingan_kepada', 15);
            $table->foreign('bimbingan_kepada')->references('nidn')->on('dosen');
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
        Schema::dropIfExists('bimbingan');
    }
}
