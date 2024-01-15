<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Services\FactoryService;
use App\Models\Kelas;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $existingIdKelas = Kelas::pluck('id')->all();

        $factoryService = new FactoryService();
        $nisSiswa = $factoryService->generateUniqueNisSiswa();

        return [
            'nis' => $nisSiswa,
            'nama_siswa' => fake()->name(),
            'jk' => fake()->randomElement(['L', 'P']),
            'alamat' => fake()->address(),
            'kelas_id' => fake()->randomElement($existingIdKelas),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
        ];
    }
}
