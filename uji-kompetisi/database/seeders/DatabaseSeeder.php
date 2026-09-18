<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// Class DatabaseSeeder digunakan untuk memasukkan data awal ke database
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /* Menjalankan proses seeding database.*/
    public function run(): void
    {
        // Membuat satu data user dengan menggunakan User Factory
        // dan menentukan nama serta email secara manual.
        User::factory()->create([
            // Menentukan nama user
            'name' => 'Test User',
            // Menentukan email user
            'email' => 'test@example.com',
        ]);
        // Membuat data user kedua dengan menggunakan User Factory
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            // Mengenkripsi password sebelum disimpan ke database
            'password' => Hash::make('user123'),
        ]);
    }
}