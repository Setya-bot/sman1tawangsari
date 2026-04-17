<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // =========================
        // User
        // =========================
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Editor',
                'role' => 'editor',
                'email' => 'editor@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        // =========================
        // SCHOOL PROFILE
        // =========================
        DB::table('school_profiles')->insert([
            'school_name' => 'SMAN 1 TAWANGSARI',
            'address' => 'Jl. Raya Tawangsari No. 1',
            'phone' => '08123456789',
            'email' => 'info@sman1.sch.id',
            'logo' => 'logo/logo.png',
            'vision' => 'Menjadi sekolah unggul dan berprestasi',
            'mission' => 'Meningkatkan kualitas pendidikan dan karakter siswa',
            'motto' => 'Disiplin, Cerdas, Berakhlak',
            'yelyel' => 'SMANSA... Jaya!',
            'mars' => 'Mars SMAN 1 Tawangsari...',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // =========================
        // SUBJECTS
        // =========================
        $subjects = [
            'Matematika',
            'Bahasa Indonesia',
            'Bahasa Inggris',
            'Fisika',
            'Kimia',
            'Biologi'
        ];
        foreach ($subjects as $subject) {
            DB::table('subjects')->insert([
                'name' => $subject,
                'description' => 'Pelajaran ' . $subject,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        // =========================
        // TEACHERS
        // =========================
        for ($i = 1; $i <= 6; $i++) {
            DB::table('teachers')->insert([
                'name' => 'Guru ' . $i,
                'nip' => '1987654321' . $i,
                'subject_id' => $i,
                'position' => 'Guru',
                'bio' => 'Guru berpengalaman di bidangnya',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        // =========================
        // NEWS
        // =========================
        for ($i = 1; $i <= 5; $i++) {
            DB::table('news')->insert([
                'title' => 'Berita Sekolah ' . $i,
                'slug' => Str::slug('Berita Sekolah ' . $i),
                'content' => 'Ini adalah isi berita ke-' . $i,
                'thumbnail' => 'news/default.jpg',
                'status' => 'publish',
                'published_at' => now(),
                'author_id' => 1,
                'views' => rand(10, 100),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        // =========================
        // EXTRACURRICULARS
        // =========================
        $extras = ['Pramuka', 'Futsal', 'Basket', 'PMR'];
        foreach ($extras as $extra) {
            DB::table('extracurriculars')->insert([
                'name' => $extra,
                'description' => 'Ekstrakurikuler ' . $extra,
                'image' => 'extras/default.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        // =========================
        // ACHIEVEMENTS
        // =========================
        for ($i = 1; $i <= 5; $i++) {
            DB::table('achievements')->insert([
                'title' => 'Juara ' . $i,
                'level' => 'Kabupaten',
                'year' => 2020 + $i,
                'image' => 'achievements/default.jpg',
                'description' => 'Prestasi ke-' . $i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        // =========================
        // GALLERIES
        // =========================
        for ($i = 1; $i <= 6; $i++) {
            DB::table('galleries')->insert([
                'title' => 'Galeri ' . $i,
                'image' => 'gallery/default.jpg',
                'category' => 'Kegiatan',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
