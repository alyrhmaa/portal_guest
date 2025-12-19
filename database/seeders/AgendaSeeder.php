<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agenda;
use Carbon\Carbon;

class AgendaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul' => 'Rapat Koordinasi Perangkat Desa',
                'deskripsi' => 'Rapat rutin untuk evaluasi kegiatan desa dan penyusunan program mingguan.',
                'tanggal_mulai' => '2025-01-10',
                'tanggal_selesai' => '2025-01-10',
                'lokasi' => 'Balai Desa Induk',
                'penyelenggara' => 'Pemerintah Desa'
            ],
            [
                'judul' => 'Gotong Royong Bersih Desa',
                'deskripsi' => 'Kegiatan gotong royong membersihkan lingkungan sekitar balai desa.',
                'tanggal_mulai' => '2025-01-12',
                'tanggal_selesai' => '2025-01-12',
                'lokasi' => 'Lingkungan Balai Desa',
                'penyelenggara' => 'Karang Taruna'
            ],
            [
                'judul' => 'Pelatihan UMKM untuk Warga',
                'deskripsi' => 'Pelatihan pengembangan usaha kecil dan menengah bagi warga desa.',
                'tanggal_mulai' => '2025-01-15',
                'tanggal_selesai' => '2025-01-16',
                'lokasi' => 'Aula Serbaguna Desa',
                'penyelenggara' => 'Dinas Koperasi & UMKM'
            ],
            [
                'judul' => 'Musyawarah Desa Tahunan',
                'deskripsi' => 'Pembahasan perencanaan pembangunan desa tahun anggaran berjalan.',
                'tanggal_mulai' => '2025-01-20',
                'tanggal_selesai' => '2025-01-20',
                'lokasi' => 'Balai Desa Utama',
                'penyelenggara' => 'BPD Desa'
            ],
        ];

        for ($i = 1; $i <= 36; $i++) {
            $data[] = [
                'judul' => "Agenda Kegiatan Desa Ke-$i",
                'deskripsi' => "Kegiatan rutin desa nomor $i untuk meningkatkan partisipasi masyarakat.",
                'tanggal_mulai' => Carbon::now()->addDays($i)->format('Y-m-d'),
                'tanggal_selesai' => Carbon::now()->addDays($i + 1)->format('Y-m-d'),
                'lokasi' => 'Balai Desa',
                'penyelenggara' => 'Pemerintah Desa',
            ];
        }

        foreach ($data as $item) {
            Agenda::create($item);
        }

        $this->command->info("Agenda berhasil di-seed tanpa error!");
    }
}
