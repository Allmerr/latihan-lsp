<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Kelas::factory()->count(12)->create();
        \App\Models\Administrator::factory()->count(2)->create();
        \App\Models\Guru::factory()->count(10)->create();
        \App\Models\Siswa::factory()->count(100)->create();
        \App\Models\Mapel::factory()->count(10)->create();
        \App\Models\Mengajar::factory()->count(30)->create();
    }
}
