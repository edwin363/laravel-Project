<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AcademicLevelTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(ScholarshipTypeTableSeeder::class);
        $this->call(TerritoriesTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
