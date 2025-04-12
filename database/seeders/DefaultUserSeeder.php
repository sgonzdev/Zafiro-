<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'emanuel@gmail.com'],
            [
                'name' => 'emanuel',
                'password' => Hash::make('1234'),
            ]
        );
    }
}
