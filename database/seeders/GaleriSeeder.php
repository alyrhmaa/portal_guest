<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;
use App\Models\Media;
use Illuminate\Support\Facades\File;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        // Buat folder jika belum ada
        $path = public_path('uploads/galeri');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true);
        }

        // Buat 30 album galeri
        for ($i = 1; $i <= 30; $i++) {

            $galeri = Galeri::create([
                'judul'     => "Album Kegiatan Desa ke-$i",
                'deskripsi' => "Dokumentasi kegiatan desa nomor $i yang dilaksanakan untuk meningkatkan partisipasi masyarakat.",
            ]);

            // Generate 1 foto dummy untuk cover
            $dummyName = "dummy-$i-" . time() . ".jpg";
            File::copy(
                public_path('dummy/dummy.jpg'), // pastikan ada file dummy.jpg
                $path . '/' . $dummyName
            );

            Media::create([
                'ref_table'  => 'galeri',
                'ref_id'     => $galeri->galeri_id,
                'file_name'  => $dummyName,
                'mime_type'  => 'image/jpeg',
                'sort_order' => 1
            ]);
        }

        $this->command->info("Berhasil membuat 30 dummy galeri + foto cover!");
    }
}
