<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiwa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\Prodi::create([
            'nama' => 'Manajemen Informatika',
        ]);
        \App\Models\Prodi::create([
            'nama' => 'Teknik Komputer',
        ]);
        \App\Models\Prodi::create([
            'nama' => 'TRPL',
        ]);

        \App\Models\Mahasiwa::factory(20)->create();
        \App\Models\Dosen::factory(10)->create();

        // User::factory(10)->create();

        //User::factory()->create([
          //  'name' => 'Test User',
            //'email' => 'test@example.com',
       // ]);
    }
}
