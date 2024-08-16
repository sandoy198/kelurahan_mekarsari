<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected static ?string $password;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'divisi' => 1
        ]);
    }
}
