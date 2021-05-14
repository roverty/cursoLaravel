<?php

use App\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curso::create([
            'nombre' => 'Machine Learning',
            'nombre_imagen' => 'machine.png',
            'fecha_inicio' => '18-03-2019',
            'fecha_fin' => '2019-03-28',
            'hora_inicio' => '09:00:00',
            'hora_fin' => '12:00:00',
            'dias' => 'Lunes a Viernes',
            'cupo_maximo' => 20,
            'semestre_id' => 1,
            'lugar_id' => 1
        ]);

        Curso::create([
            'nombre' => 'Blender',
            'nombre_imagen' => 'blender.png',
            'fecha_inicio' => '18-03-2019',
            'fecha_fin' => '28-03-2019',
            'hora_inicio' => '09:00:00',
            'hora_fin' => '12:00:00',
            'dias' => 'Lunes a Viernes',
            'cupo_maximo' => 20,
            'semestre_id' => 1,
            'lugar_id' => 2
        ]);

        Curso::create([
            'nombre' => 'Diseño de circutos impresos',
            'nombre_imagen' => 'pcb.png',
            'fecha_inicio' => '18-03-2019',
            'fecha_fin' => '28-03-2019',
            'hora_inicio' => '09:00:00',
            'hora_fin' => '12:00:00',
            'dias' => 'Lunes a Viernes',
            'cupo_maximo' => 20,
            'semestre_id' => 1,
            'lugar_id' => 2
        ]);

        Curso::create([
            'nombre' => 'Arduino Avanzado',
            'nombre_imagen' => 'arduino.png',
            'fecha_inicio' => '18-03-2019',
            'fecha_fin' => '28-03-2019',
            'hora_inicio' => '09:00:00',
            'hora_fin' => '12:00:00',
            'dias' => 'Lunes a Viernes',
            'cupo_maximo' => 20,
            'semestre_id' => 1,
            'lugar_id' => 3
        ]);
    }
}
