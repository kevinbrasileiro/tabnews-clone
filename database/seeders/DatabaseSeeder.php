<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'josefoguetes',
            'email' => 'josefoguetes@example.com',
            'password' => 'josefoguetes',
        ]);

        User::factory()->create([
            'username' => 'joaomotores',
            'email' => 'joaomotores@example.com',
            'password' => 'joaomotores',
        ]);

        $this->call(CommentSeeder::class);
    }
}
