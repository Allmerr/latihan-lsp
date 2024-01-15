<?php

namespace App\Services;
use Illuminate\Support\Str;
use App\Models\Administrator;
use App\Models\Guru;
use App\Models\Siswa;

class FactoryService{
    public function generateIdAdmin(): int
    {
        $id = random_int(10000, 99999);
        return $id;
    }

    public function generateUniqueIdAdmin(): int
    {
        $id = $this->generateIdAdmin();

        while (!$this->isUniqueIdAdmin($id)) {
            $id = $this->generateIdAdmin();
        }

        return $id;
    }

    public function isUniqueIdAdmin(int $id_admin): bool
    {
        $administrator = Administrator::where('id_admin', $id_admin)->first();

        return $administrator === null;
    }

    public function generateNipGuru(): int
    {
        $nip = random_int(0000000000, 9999999999);
        return $nip;
    }

    public function generateUniqueNipGuru(): int
    {
        $nip = $this->generateNipGuru();

        while (!$this->isUniqueNipGuru($nip)) {
            $nip = $this->generateNipGuru();
        }

        return $nip;
    }

    public function isUniqueNipGuru(int $nip): bool
    {
        $guru = Guru::where('nip', $nip)->first();

        return $guru === null;
    }

    public function generateNisSiswa(): int
    {
        $nis = random_int(0000000000, 9999999999);
        return $nis;
    }

    public function generateUniqueNisSiswa(): int
    {
        $nis = $this->generateNisSiswa();

        while (!$this->isUniqueNisSiswa($nis)) {
            $nis = $this->generateNisSiswa();
        }

        return $nis;
    }

    public function isUniqueNisSiswa(int $nis): bool
    {
        $siswa = Siswa::where('nis', $nis)->first();

        return $siswa === null;
    }
}
