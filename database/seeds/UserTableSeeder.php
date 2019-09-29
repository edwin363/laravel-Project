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
        $user = new User();
        $user->user = "Admin";
        $user->email = "admin@gmail.com";
        $user->role_id = 1;
        $user->password = bcrypt('admin123/');
        $user->save();
    }
}
