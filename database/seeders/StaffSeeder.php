<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\RoleEnums;
use App\Enums\StatusEnums;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds for KUIT LIMITED staff members.
     */
    public function run(): void
    {
        $staffMembers = [
            [
                'name' => 'KUIT Admin',
                'username' => 'admin',
                'email' => 'admin@kuitltd.com',
                'password' => Hash::make('admin123'),
                'role' => RoleEnums::SuperAdministrator->value,
                'status' => StatusEnums::Enable->value,
            ],
            [
                'name' => 'KUIT Operations Engineer',
                'username' => 'engineer',
                'email' => 'operations@kuitltd.com',
                'password' => Hash::make('admin123'),
                'role' => RoleEnums::Staff->value,
                'status' => StatusEnums::Enable->value,
            ],
            [
                'name' => 'KUIT Support',
                'username' => 'support',
                'email' => 'support@kuitltd.com',
                'password' => Hash::make('admin123'),
                'role' => RoleEnums::Staff->value,
                'status' => StatusEnums::Enable->value,
            ],
        ];

        foreach ($staffMembers as $data) {
            User::updateOrCreate(
                ['email' => $data['email']],
                $data
            );
        }
    }
}
