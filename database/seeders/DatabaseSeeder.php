<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        DB::table('usuarios')->insert([
            'nome' => Str::random(50),
            'cpf' => Str::random(14),
            'data_nascimento' => '2000-1-1',
            'email' => Str::random(10).'@gmail.com',
            'telefone' => '99 99999 9999',
            'endereco' => Str::random(20),
            'cidade' => Str::random(10),
            'estado' => Str::random(10),
            'cep' => 00000000
        ]);
    }
}
