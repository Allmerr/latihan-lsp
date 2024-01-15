<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Kelas;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mengajars', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Guru::class);
            $table->foreignIdFor(Mapel::class);
            $table->foreignIdFor(Kelas::class);
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
