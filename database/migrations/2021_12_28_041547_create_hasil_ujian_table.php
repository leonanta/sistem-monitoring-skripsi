<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_ujian', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 15);
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->unsignedBigInteger('id_proposal');
            $table->foreign('id_proposal')->references('id')->on('proposal');
            $table->unsignedBigInteger('id_jadwal_ujian')->nullable();
            $table->foreign('id_jadwal_ujian')->references('id')->on('jadwal_ujian');
            $table->enum('berita_acara', ['Lulus', 'Tidak Lulus'])->default('Lulus');
            $table->string('sikap1', 5)->nullable();
            $table->string('presentasi1', 5)->nullable();
            $table->string('teori1', 5)->nullable();
            $table->string('program1', 5)->nullable();
            $table->string('jumlah1', 5)->nullable();
            $table->string('keterangan1', 5)->nullable();
            $table->text('revisi1')->nullable();
            $table->string('sikap2', 5)->nullable();
            $table->string('presentasi2', 5)->nullable();
            $table->string('teori2', 5)->nullable();
            $table->string('program2', 5)->nullable();
            $table->string('jumlah2', 5)->nullable();
            $table->string('keterangan2', 5)->nullable();
            $table->text('revisi2')->nullable();
            $table->string('sikap3', 5)->nullable();
            $table->string('presentasi3', 5)->nullable();
            $table->string('teori3', 5)->nullable();
            $table->string('program3', 5)->nullable();
            $table->string('jumlah3', 5)->nullable();
            $table->string('keterangan3', 5)->nullable();
            $table->text('revisi3')->nullable();
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
        Schema::dropIfExists('hasil_ujian');
    }
}
