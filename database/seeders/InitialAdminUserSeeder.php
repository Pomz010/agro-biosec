<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InitialAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('users')->where('username', 'admin')->doesntExist()) {
            DB::table('users')->insert([
                'respondents_id' => null,
                'username' => 'admin', // A distinctive name for this special user
                'email' => null, // <--- IMPORTANT: Email is NULL
                'password' => Hash::make('admin12345'), // Choose a strong password!
                'role' => 'admin',
                'force_password_change' => true,
                'email_verified_at' => null, // No email, so not verified
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
