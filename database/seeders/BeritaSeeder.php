<?php
namespace Database\Seeders;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $kategori = KategoriBerita::all();

        if ($kategori->count() == 0) {
            $this->command->error("Seeder kategori belum dijalankan!");
            return;
        }

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

        $isiList = [
            "Kegiatan ini mendapat dukungan penuh dari warga dan berjalan dengan baik.",
            "Pemerintah desa menghimbau warga untuk aktif mengikuti program yang telah dijadwalkan.",
            "Informasi lebih lanjut akan diberikan melalui kanal resmi desa.",
            "Acara ini diadakan untuk meningkatkan kualitas pelayanan kepada masyarakat.",
            "Warga diharapkan berpartisipasi dalam kegiatan yang telah direncanakan.",
        ];

        foreach (range(1, 100) as $i) {

            $judul = $faker->randomElement($judulList);
            $isi   = $faker->randomElement($isiList);

            Berita::create([
                'kategori_id' => $kategori->random()->kategori_id,
                'judul'       => $judul,
                'slug'        => Str::slug($judul) . '-' . Str::random(6), // anti duplikasi
                'isi_html'    => "<p>$isi</p>",
                'penulis'     => $faker->name(),
                'status'      => $faker->randomElement(['draft', 'publish']),
                'terbit_at'   => now()->subDays(rand(0, 30)), // terbit antara 0–30 hari yang lalu
            ]);
            // Media::create([
            //     'ref_table'  => 'galeri',
            //     'ref_id'     => $berita->berita_id,
            //     'file_name'  => $dummyName,
            //     'mime_type'  => 'image/jpeg',
            //     'sort_order' => 1,
            // ]);
        }

        $this->command->info("Berhasil membuat 100 berita dummy berbahasa Indonesia!");
    }
}
