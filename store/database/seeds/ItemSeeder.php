<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('items')->insert([
            'name' => 'Camisa manga larga azul',
            'price' => 75000,
            'description' => 'Talla: Cintura 88 cm, Pecho 102 cm ',
        ]);
        
    }
}
