<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Role;
use App\RoleUserPivot;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Carbon;

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
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => Role::ROLES[Role::PLATFORM_ADMIN_ROLE],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => Role::ROLES[Role::EMPLOYEE_ROLE],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        Role::insert($roles);

        $super_admin = User::create([
            'first_name' => 'SuperAdmin',
            'last_name' => 'User',
            'phone' => rand(1111111111, 9999999999),
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        RoleUserPivot::insert([
            'user_id' => $super_admin->id,
            'role_id' => Role::SUPER_ADMIN_ROLE,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
