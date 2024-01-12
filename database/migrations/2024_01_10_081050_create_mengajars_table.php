<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mengajars', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('guru_id');
            $table->foreign('guru_id')->references('id')->on('guru');
            $table->unsignedInteger('mapel_id');
            $table->foreign('mapel_id')->references('id')->on('mapel');
            $table->unsignedInteger('kelas_id');
            $table->foreign('kelas_id')->references('id')->on('kelas');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mengajars');
    }
};
