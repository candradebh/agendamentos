<?php
use Oncoclinicas\Models\Paciente;

use Illuminate\Database\Seeder;

class PacienteTableSeeder extends Seeder
{
    public function run()

    {
        factory(Paciente::class,30)->create();
    }
}
