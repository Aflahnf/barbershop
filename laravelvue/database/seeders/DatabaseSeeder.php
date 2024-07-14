<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Hairstylist;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Hairstylist::factory(10)->create();

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


        // Service Bronze
        $bronze = Service::factory()->create([
            'service_name' => 'Bronze',
            'description' => 'Cut Only',
            'price' => 100000,
            'category' => 'Bronze',
        ]);

        // Service Bronze
        $silver = Service::factory()->create([
            'service_name' => 'Silver',
            'description' => 'Cut & Wash',
            'price' => 200000,
            'category' => 'Silver',
        ]);

        // Service Bronze
        $gold = Service::factory()->create([
            'service_name' => 'Gold',
            'description' => 'Cut, Wash, Styling, Massage & Hair Vitamin',
            'price' => 300000,
            'category' => 'Gold',
        ]);
    }
}
