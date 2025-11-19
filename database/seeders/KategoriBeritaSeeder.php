<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriBerita;
use Illuminate\Support\Str;

class KategoriBeritaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Pemerintahan Desa',
            'Kegiatan Warga',
            'Pengumuman',
            'Pendidikan',
        ];

        foreach ($data as $nama) {
            KategoriBerita::create([
                'nama' => $nama,
                'slug' => Str::slug($nama),
                'deskripsi' => null, // ❗ Tidak ada deskripsi otomatis
            ]);
        }

        $this->command->info("Kategori awal berhasil dibuat!");
    }
}
