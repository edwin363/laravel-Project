<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->name = "admin";
        $role->save();

        $role = new Role;
        $role->name = "becario";
        $role->save();

        $role = new Role;
        $role->name = "estudiante";
        $role->save();
    }
}
