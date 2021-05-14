<?php

use App\Lugar;
use Illuminate\Database\Seeder;

class LugarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lugar::create([
            'edificio' => 'P',
            'salon' => 'P-101'
        ]);
        Lugar::create([
            'edificio' => 'Q',
            'salon' => 'P-220 Proteco'
        ]);
        Lugar::create([
            'edificio' => 'T',
            'salon' => 'T-101 IBM'
        ]);
    }
}
