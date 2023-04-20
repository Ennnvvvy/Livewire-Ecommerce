<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(500)->create();
        User::factory(500)->create();


        User::factory()->create([
            'username' => 'Admin1',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
        ]);
    }
}
