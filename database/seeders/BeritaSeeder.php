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
        $faker = Faker::create('id_ID'); // Nama Indonesia

        $kategori = KategoriBerita::all();

        if ($kategori->count() == 0) {
            $this->command->error("Seeder kategori belum dijalankan!");
            return;
        }

        // Kumpulan judul berita berbahasa Indonesia
        $judulList = [
            "Pemerintah Desa Gelar Rapat Koordinasi",
            "Kegiatan Gotong Royong Berjalan Lancar",
            "Pengumuman Penting untuk Seluruh Warga",
            "Pelayanan Administrasi Desa Ditingkatkan",
            "Program Pembangunan Desa Dimulai",
            "Sosialisasi Kesehatan untuk Masyarakat",
            "Acara Desa Sukses Digelar",
            "Informasi Terbaru dari Pemerintah Desa",
            "Kegiatan Pendidikan dan Pelatihan Warga",
            "Peningkatan Sarana dan Prasarana Desa",
        ];

        // Kumpulan isi berita berbahasa Indonesia
        $isiList = [
            "Kegiatan ini mendapat dukungan penuh dari warga dan berjalan dengan baik.",
            "Pemerintah desa menghimbau warga untuk aktif mengikuti program yang telah dijadwalkan.",
            "Informasi lebih lanjut akan diberikan melalui kanal resmi desa.",
            "Acara ini diadakan untuk meningkatkan kualitas pelayanan kepada masyarakat.",
            "Warga diharapkan berpartisipasi dalam kegiatan yang telah direncanakan.",
        ];

        foreach (range(1, 10) as $i) {

            $judul = $faker->randomElement($judulList);
            $isi   = $faker->randomElement($isiList);

            Berita::create([
                'kategori_id' => $kategori->random()->kategori_id,
                'judul'       => $judul,
                'slug'        => Str::slug($judul . '-' . $i),
                'isi_html'    => "<p>$isi</p>",
                'penulis'     => $faker->name(), // Nama Indonesia OK
                'status'      => $faker->randomElement(['draft', 'publish']),
                'terbit_at'   => now(),
            ]);
        }

        $this->command->info("Berhasil membuat 10 berita dummy berbahasa Indonesia!");
    }
}
