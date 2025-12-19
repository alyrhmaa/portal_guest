<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->id('profil_id');
            $table->string('nama_desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->text('alamat_kantor');
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->timestamps();
        });

        // Insert data default langsung di migration
        DB::table('profil')->insert([
            'nama_desa' => 'Desa Mekar Jaya',
            'kecamatan' => 'Kecamatan Contoh',
            'kabupaten' => 'Kabupaten Sample',
            'provinsi' => 'Jawa Barat',
            'alamat_kantor' => 'Jl. Raya Desa No. 123',
            'email' => 'desa@contoh.com',
            'telepon' => '(021) 1234567',
            'visi' => 'Menjadi desa yang maju, mandiri, dan sejahtera',
            'misi' => 'Meningkatkan kesejahteraan masyarakat melalui pembangunan berkelanjutan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('profil');
    }
};
