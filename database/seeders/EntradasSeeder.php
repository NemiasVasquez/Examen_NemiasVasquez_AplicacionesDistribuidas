<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entrada;
use App\Models\Evento;
use Illuminate\Support\Str;
class EntradasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventos = Evento::all(); 

        foreach ($eventos as $evento) {
            for ($i = 1; $i <= rand(10, 15); $i++) { 
                Entrada::create([
                    'evento_id' => $evento->id,
                    'pago' => rand(500, 2000) / 100, 
                    'dni' => Str::random(8),
                ]);
            }
        }
    }
}
