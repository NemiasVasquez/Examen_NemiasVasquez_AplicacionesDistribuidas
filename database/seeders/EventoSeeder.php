<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Evento;
use Illuminate\Support\Str;
class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            Evento::create([
                'nombre' => 'Evento ' . Str::random(3),
                'descripcion' => 'Descripción ' . Str::random(5),
                'fecha_inicio' => now(),
                'fecha_fin' => now()->addDays(30),
                'costo' => rand(1000, 10000) / 100, 
            ]);
        }
    }
}
