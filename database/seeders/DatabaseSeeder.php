<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;
use App\Models\Usuario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nome' => 'Aluizio Silva de Paiva Junior',
            'cpf' => '111.222.333-44',
            'data_nascimento' => '1998-04-02',
            'email' => 'jr-paiva@live.com',
            'telefone' => '92 98153 1573',
            'endereco' => 'Rua Flávio Costa',
            'cidade' => 'Manaus',
            'estado' => 'AM',
            'cep' => 69080710
        ])->save();

    }
}
