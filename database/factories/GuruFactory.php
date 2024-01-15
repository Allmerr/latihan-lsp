<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Services\FactoryService;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $factoryService = new FactoryService();
        $nipGuru = $factoryService->generateUniqueNipGuru();

        return [
            'nama_guru' => fake()->name(),
            'jk' => fake()->randomElement(['L', 'P']),
            'alamat' => fake()->address(),
            'nip' => $nipGuru,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
        ];
    }
}
