<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Role;
use App\RoleUserPivot;
use Ramsey\Uuid\Type\Integer;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new DateTime();

        $roles = [
            [
                'name' => Role::ROLES[Role::SUPER_ADMIN_ROLE],
                'created_at' => $date->getTimestamp(),
                'updated_at' => $date->getTimestamp(),
            ],
            [
                'name' => Role::ROLES[Role::PLATFORM_ADMIN_ROLE],
                'created_at' => $date->getTimestamp(),
                'updated_at' => $date->getTimestamp(),
            ],
            [
                'name' => Role::ROLES[Role::EMPLOYEE_ROLE],
                'created_at' => $date->getTimestamp(),
                'updated_at' => $date->getTimestamp(),
            ]
        ];

        Role::insert($roles);

        $super_admin = User::create([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'phone' => rand(1111111111, 9999999999),
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'created_at' => $date->getTimestamp(),
            'updated_at' => $date->getTimestamp()
        ]);

        RoleUserPivot::insert([
            'user_id' => $super_admin->id,
            'role_id' => Role::SUPER_ADMIN_ROLE,
            'created_at' => $date->getTimestamp(),
            'updated_at' => $date->getTimestamp()
        ]);
    }
}
