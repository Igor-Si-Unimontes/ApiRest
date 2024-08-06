<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'title' => 'Ferias Igor',
                'description' => 'Hoje inicia as ferias de Igor',
                'date' => '2024-08-01',
                'location' => 'Montes Claros Minas Gerais',
            ],
            [
                'title' => 'Fim de ferias Joao',
                'description' => 'Hoje encerra as ferias de joao',
                'date' => '2024-08-15',
                'location' => 'Montes Claros Minas Gerais',
            ],
            [
                'title' => 'Fim de ferias Teresa',
                'description' => 'Hoje encerra as ferias de Teresa',
                'date' => '2024-08-15',
                'location' => 'Montes Claros Minas Gerais',
            ],
            [
                'title' => 'Fim de ferias Marcos',
                'description' => 'Hoje encerra as ferias de Marcos',
                'date' => '2024-08-15',
                'location' => 'Montes Claros Minas Gerais',
            ],
        ]);
    }
}
