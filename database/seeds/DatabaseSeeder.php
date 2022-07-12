<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\RoleUserPivot;
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
        $super_admin = new User;
        $super_admin->first_name = 'SuperAdmin';
        $super_admin->last_name = 'User';
        $super_admin->phone = rand(1111111111, 9999999999);
        $super_admin->email = 'admin@admin.com';
        $super_admin->password = Hash::make('password');
        $super_admin->created_at = Carbon::now();
        $super_admin->updated_at = Carbon::now();
        $super_admin->save();

        RoleUserPivot::insert([
            'user_id' => $super_admin->id,
            'role_id' => Role::SUPER_ADMIN_ROLE,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
