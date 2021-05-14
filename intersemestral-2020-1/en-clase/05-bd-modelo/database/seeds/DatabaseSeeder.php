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
        // $this->call(UsersTableSeeder::class);
        $this->call(LugarSeeder::class);
        $this->call(SemestreSeeder::class);
        $this->call(CursoSeeder::class);
    }
}
