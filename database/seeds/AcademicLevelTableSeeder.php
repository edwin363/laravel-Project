<?php

use Illuminate\Database\Seeder;
use App\Models\Academic_level;

class AcademicLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $academicLevel = new Academic_level;
        $academicLevel->academic_level = "Bachillerato";
        $academicLevel->save();

        $academicLevel = new Academic_level;
        $academicLevel->academic_level = "Universidad";
        $academicLevel->save();
    }
}
