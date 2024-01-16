<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Services\FactoryService;
use Illuminate\Support\Str;
use App\Models\Kelas;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        do {
            $kelas = $this->faker->randomElement(['10', '11', '12', '13']);
            $jurusan = $this->faker->randomElement(['DKV', 'BKP', 'DPIB', 'RPL', 'SIJA', 'TKJ', 'TP', 'TOI', 'TKR', 'TFLM']);
            $rombel = $this->faker->randomElement(['1', '2', '3', '4']);
            $nama_kelas = $kelas .  '_'. $jurusan . '_' . $rombel;
        } while (Kelas::where('nama_kelas', $nama_kelas)->exists());

        return [
            'kelas' => $kelas,
            'jurusan' => $jurusan,
            'rombel' => $rombel,
            'nama_kelas' => $nama_kelas,
        ];
    }
}
