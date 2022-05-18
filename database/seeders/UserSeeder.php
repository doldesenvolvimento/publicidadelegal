<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Administrador',
                'email' => 'adeilson.pinheiro@gruporba.com.br', 
                'password' => Hash::make('102030'),
                'tipo' => 1, // 1 = administrador, 2 = operador
                'criador' => 1,
                'modificador' => 1,
            ]
        );
    }
}
