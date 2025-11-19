<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // 🇮🇩 Bahasa Indonesia

        $kategori = KategoriBerita::all();

        if ($kategori->count() == 0) {
            $this->command->error("Seeder kategori belum dijalankan!");
            return;
        }

        foreach (range(1, 10) as $i) {

            $judul = $faker->sentence(6);

            Berita::create([
                'kategori_id' => $kategori->random()->kategori_id,
                'judul'       => $judul,
                'slug'        => Str::slug($judul . '-' . $i),
                'isi_html'    => '<p>' . $faker->paragraph(8) . '</p>',
                'penulis'     => $faker->name(),
                'status'      => $faker->randomElement(['draft', 'publish']),
                'terbit_at'   => now(),
            ]);
        }

        $this->command->info("Berhasil membuat 10 berita dummy!");
    }
}
