<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\RoleEnums;
use App\Enums\StatusEnums;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'KUIT Admin',
                'username' => 'admin',
                'email' => 'admin@kuitltd.com',
                'password' => Hash::make('admin123'),
                'role' => RoleEnums::SuperAdministrator->value,
                'status' => StatusEnums::Enable->value,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'KUIT Support',
                'username' => 'support',
                'email' => 'support@kuitltd.com',
                'password' => Hash::make('admin123'),
                'role' => RoleEnums::Administrator->value,
                'status' => StatusEnums::Enable->value,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'KUIT Operations',
                'username' => 'operations',
                'email' => 'operations@kuitltd.com',
                'password' => Hash::make('admin123'),
                'role' => RoleEnums::Staff->value,
                'status' => StatusEnums::Enable->value,
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }
    }
}
