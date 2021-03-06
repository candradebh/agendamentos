<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        $this->call(PacienteTableSeeder::class);
        $this->call(MedicoTableSeeder::class);
        $this->call(EventTableSeeder::class);
    }
}
