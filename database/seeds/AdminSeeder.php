<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin'
        ]);
        User::create([
            'name' => config('admin.name'),
            'email' => config('admin.mail'),
            'password' => Hash::make(config('admin.migration_password')),
        ])
            ->roles()
            ->attach(1);
    }
}
