<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Check if admin already exists
        $adminEmail = 'admin@idontwantmycaranymore.co.uk';

        if (!User::where('email', $adminEmail)->exists()) {
            User::create([
                'name' => 'Car Administrator',
                'email' => $adminEmail,
                'password' => Hash::make('password123'), // Default password
                'email_verified_at' => now(),
            ]);

            $this->command->info('Admin user created successfully.');
            $this->command->info('Email: ' . $adminEmail);
            $this->command->info('Password: password123');
        } else {
            $this->command->info('Admin user already exists.');
        }
    }
}
