<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create(['name' => 'Admin',     'email' => 'admin@test.com',     'role' => 'admin']);
        User::factory()->create(['name' => 'Dosen',     'email' => 'dosen@test.com',     'role' => 'dosen']);
        User::factory()->create(['name' => 'Mahasiswa', 'email' => 'mahasiswa@test.com', 'role' => 'mahasiswa']);
    }
}