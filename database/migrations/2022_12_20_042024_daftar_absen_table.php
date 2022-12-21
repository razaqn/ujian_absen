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
        Schema::create('daftar_absen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('absen_id')->default(0);
            $table->unsignedBigInteger('siswa_id')->default(0);
            $table->time('jam')->nullable();
            $table->timestamps();

            $table->foreign('absen_id')
                        ->references('id')
                        ->on('absensi')
                        ->onDelete('cascade');

        $table->foreign('siswa_id')
                        ->references('id')
                        ->on('siswa')
                        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_absen');
    }
};
