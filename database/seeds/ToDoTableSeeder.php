<?php

use Illuminate\Database\Seeder;
use App\ToDo;

class ToDoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ToDo::create([
            'name' => 'Doing HRM Project.'
        ]);

        ToDo::create([
            'name' => 'HRM Code Review.'
        ]);
        ToDo::create([
            'name' => 'Hangout on evening.'
        ]);
        ToDo::create([
            'name' => 'Gaming tonight.'
        ]);
    }
}
