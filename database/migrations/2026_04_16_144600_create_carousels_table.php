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
        Schema::create('carousels', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Judul di atas gambar
            $table->text('description')->nullable(); // Penjelasan singkat
            $table->string('image'); // Nama file gambar
            $table->string('link')->nullable(); // URL tujuan jika gambar diklik (misal ke berita tertentu)
            $table->integer('order')->default(0); // Untuk mengatur urutan (1, 2, 3...)
            $table->boolean('is_active')->default(true); // Unthouk menyembunyikan/menampilkan slide
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carousels');
    }
};
