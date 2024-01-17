<?php

namespace Database\Factories;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mengajar>
 */
class MengajarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $existingGuruIds = Guru::pluck('id')->all();
        $existingMapelIds = Mapel::pluck('id')->all();
        $existingKelasIds = Kelas::pluck('id')->all();
        do {
            $guru_id = fake()->randomElement($existingGuruIds);
            $mapel_id = fake()->randomElement($existingMapelIds);
            $kelas_id = fake()->randomElement($existingKelasIds);
        } while (Mengajar::where('guru_id', $guru_id)->where('mapel_id', $mapel_id)->where('kelas_id', $kelas_id)->exists());

        return [
            'guru_id' => $guru_id,
            'mapel_id' => $mapel_id,
            'kelas_id' => $kelas_id',
        ];
    }
}
