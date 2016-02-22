<?php
use Oncoclinicas\Models\Medico;

use Illuminate\Database\Seeder;

class MedicoTableSeeder extends Seeder
{
    public function run()

    {
        factory(Medico::class,10)->create();
    }
}
