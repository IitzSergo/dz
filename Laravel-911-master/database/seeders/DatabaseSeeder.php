<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tag::factory(10)->create();

        User::factory()->create([
            'name' => 'Andriy',
            'email' => 'marchycandriy@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin'
        ]);

        // User::factory()->create([
        //     'name' => 'not admin',
        //     'email' => 'not-admin@gmail.com',
        //     'password' => Hash::make('12345678')
        // ]);
    }
}