<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
        $table->id('berita_id');
        $table->unsignedBigInteger('kategori_id');
        $table->foreign('kategori_id')->references('kategori_id')->on('kategori_berita')->onDelete('cascade');

        $table->string('judul');
        $table->string('slug')->unique();
        $table->text('isi_html');
        $table->string('penulis');
        $table->enum('status', ['draft', 'publish'])->default('draft');
        $table->timestamp('terbit_at')->nullable();

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
