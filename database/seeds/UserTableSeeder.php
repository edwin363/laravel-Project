<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->user = "Admin";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt('admin123/');
        $user->save();

        $user->roles()->attach($role_admin);
    }
}
