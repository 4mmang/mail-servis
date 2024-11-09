<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ismail Umar',
            'email' => 'ismailumar@gmail.com',
            'password' => Hash::make('151297')
        ]);

        // Kategori::create([
        //     'kategori' => 'Handphone'
        // ]);

        // Kategori::create([
        //     'kategori' => 'Laptop'
        // ]);
    }
}
