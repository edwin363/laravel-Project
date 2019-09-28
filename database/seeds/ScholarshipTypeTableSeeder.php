<?php

use Illuminate\Database\Seeder;
use App\Models\Scholarship_type;

class ScholarshipTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scholarshipType = new Scholarship_type;
        $scholarshipType->scholarship_type = "Media beca";
        $scholarshipType->save();

        $scholarshipType = new Scholarship_type;
        $scholarshipType->scholarship_type = "Beca completa";
        $scholarshipType->save();
    }
}
