<?php

use Oncoclinicas\Models\Event;

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        factory(Event::class,200)->create();
    }
}
