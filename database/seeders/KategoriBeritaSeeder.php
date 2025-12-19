<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriBerita;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class KategoriBeritaSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus semua data tanpa mengganggu foreign key
        KategoriBerita::query()->delete();

        // Reset auto increment
        DB::statement('ALTER TABLE kategori_berita AUTO_INCREMENT = 1');

        $data = [
            [
                'nama' => 'Pemerintahan Desa',
                'deskripsi' => 'Berita mengenai administrasi, kebijakan, dan aktivitas pemerintahan desa.',
            ],
            [
                'nama' => 'Kegiatan Warga',
                'deskripsi' => 'Kumpulan informasi dan dokumentasi kegiatan masyarakat desa.',
            ],
            [
                'nama' => 'Pengumuman',
                'deskripsi' => 'Informasi penting yang perlu diketahui oleh seluruh warga desa.',
            ],
            [
                'nama' => 'Pendidikan',
                'deskripsi' => 'Berita dan informasi terkait dunia pendidikan di lingkungan desa.',
            ],
        ];

        foreach ($data as $item) {
            KategoriBerita::create([
                'nama' => $item['nama'],
                'slug' => Str::slug($item['nama']),
                'deskripsi' => $item['deskripsi'],
            ]);
        }

        $this->command->info("Kategori berita berhasil di-seed ulang tanpa masalah foreign key!");
    }
}
