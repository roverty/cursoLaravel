<?php

use App\Semestre;
use Illuminate\Database\Seeder;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semestre::create([
            'annio' => 2019,
            'periodo' => 1
        ]);
        Semestre::create([
            'annio' => 2019,
            'periodo' => 2
        ]);
        Semestre::create([
            'annio' => 2020,
            'periodo' => 1
        ]);
        Semestre::create([
            'annio' => 2020,
            'periodo' => 2
        ]);
    }
}
