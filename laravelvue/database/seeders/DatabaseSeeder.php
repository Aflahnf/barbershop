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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Admin
        $admin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@aabb.dev',
            'password' => bcrypt('admin'),
        ]);

        // /Editor/
        $editor = User::factory()->create([
            'name' => 'Editor',
            'email' => 'editor@aabb.dev',
            'password' => bcrypt('editor'),
        ]);

        // /Simple User/
        $simpleUser = User::factory()->create([
            'name' => 'Super User',
            'email' => 'user@aabb.dev',
            'password' => bcrypt('user'),
        ]);
    }
}
