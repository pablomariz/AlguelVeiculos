<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::create(['nome' => 'Audi']);
        Tipo::create(['nome' => 'BMW']);
        Tipo::create(['nome' => 'Chevrolet']);
        Tipo::create(['nome' => 'Citroen']);
        Tipo::create(['nome' => 'Fiat']);
        Tipo::create(['nome' => 'Ford']);
        Tipo::create(['nome' => 'Honda']);
        Tipo::create(['nome' => 'Hyundai']);
        Tipo::create(['nome' => 'Jeep']);
        Tipo::create(['nome' => 'Toyota']);
        Tipo::create(['nome' => 'VolksWagen']);

    }
}
