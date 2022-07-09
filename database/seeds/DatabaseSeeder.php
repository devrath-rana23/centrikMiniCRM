<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Role;
use App\RoleUserPivot;

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
                'name' => Role::ROLES[1],
                'created_at' => $date->getTimestamp(),
                'updated_at' => $date->getTimestamp(),
            ],
            [
                'name' => Role::ROLES[2],
                'created_at' => $date->getTimestamp(),
                'updated_at' => $date->getTimestamp(),
            ],
            [
                'name' => Role::ROLES[3],
                'created_at' => $date->getTimestamp(),
                'updated_at' => $date->getTimestamp(),
            ]
        ];

        Role::insert($roles);

        $super_admin = User::create([
            'name' => Str::random(10),
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'created_at' => $date->getTimestamp(),
            'updated_at' => $date->getTimestamp()
        ]);

        RoleUserPivot::insert([
            'user_id' => $super_admin->id,
            'role_id' => 1,
            'created_at' => $date->getTimestamp(),
            'updated_at' => $date->getTimestamp()
        ]);
    }
}
