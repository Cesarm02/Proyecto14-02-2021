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
        $this->call(PermisoSeeder::class);
        $this->call(PublicacionesSeeder::class);
        // $this->call(MedicamentosSeeder::class);

    }
}
