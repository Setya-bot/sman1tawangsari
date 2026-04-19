<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // USERS
        // =========================
        // DB::table('users')->insert([
        //     [
        //         'name' => 'Administrator',
        //         'email' => 'admin@gmail.com',
        //         'password' => Hash::make('password'),
        //         'role' => 'admin',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'name' => 'Editor',
        //         'email' => 'editor@gmail.com',
        //         'password' => Hash::make('password'),
        //         'role' => 'editor',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]
        // ]);

        // =========================
        // ADMINISTRATORS
        // =========================
        DB::table('administrators')->insert([
            [
                'name' => 'Ahmad Suryanto',
                'role' => 'pengurus',
                'keterangan' => 'Kepala Sekolah',
                'nip' => '196505121990031002',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sri Wahyuni',
                'nip' => '198377992109320003',
                'role' => 'guru',
                'keterangan' => 'Guru IPA',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // =========================
        // EKSKULS
        // =========================
        $ekskuls = ['Pramuka', 'Futsal', 'Basket', 'PMR'];

        foreach ($ekskuls as $ekskul) {
            DB::table('ekskuls')->insert([
                'name' => $ekskul,
                'slug' => Str::slug($ekskul),
                'description' => 'Ekskul ' . $ekskul,
                'pembina' => 'Pembina ' . $ekskul,
                'instagram' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // =========================
        // NEWS
        // =========================
        for ($i = 1; $i <= 5; $i++) {
            DB::table('news')->insert([
                'news_title' => 'Berita Sekolah ' . $i,
                'slug' => Str::slug('Berita Sekolah ' . $i),
                'content' => '<p>Isi berita ke-' . $i . '</p>',
                'thumbnail' => 'news/default.jpg',
                'status' => 'publish',
                'published_at' => now(),
                'author_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // =========================
        // ACADEMICS
        // =========================
        DB::table('academics')->insert([
            [
                'event_name' => 'Ujian Tengah Semester',
                'description' => 'UTS Semester Genap',
                'start_date' => '2026-05-01',
                'end_date' => '2026-05-07',
                'academic_year' => '2026/2027',
                'status' => 'mendatang',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // =========================
        // FASILITAS
        // =========================
        DB::table('fasilitas')->insert([
            [
                'fasilitas_name' => 'Laboratorium Komputer',
                'fasilitas_desc' => 'Lab dengan komputer lengkap',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fasilitas_name' => 'Perpustakaan',
                'fasilitas_desc' => 'Koleksi buku lengkap',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // =========================
        // ACHIEVEMENTS
        // =========================
        DB::table('achievements')->insert([
            [
                'title' => 'Juara 1 Olimpiade',
                'content' => 'Prestasi tingkat nasional',
                'date' => '2025-08-01',
                'kategori' => 'akademik',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // =========================
        // ALUMNI
        // =========================
        DB::table('alumni')->insert([
            [
                'alumni_name' => 'Andi Pratama',
                'story' => 'Sekarang kuliah di ITB',
                'graduate_at' => 2022,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'alumni_name' => 'Siti Aisyah',
                'story' => 'Bekerja di perusahaan teknologi',
                'graduate_at' => 2021,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}