<?php

use Illuminate\Database\Seeder;
use App\Models\Territory;

class TerritoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $territory = new Territory;
        $territory->territory = "Extrangero";
        $territory->save();

        $territory = new Territory;
        $territory->territory = "Nacional";
        $territory->save();
    }
}
