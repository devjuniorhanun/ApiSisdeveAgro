<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Api\Cadastros\AnoAgricula;
use App\Models\Api\Cadastros\Empresa;
use App\Models\Api\Cadastros\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //zUser::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com.br',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'), // 123456789
            'remember_token' => Str::random(10),
        ]);

        Empresa::create([
            'nome' => 'Empresa',
            'email' => 'empresa@empresa.com.br',
            'cnpj' => 'cnpj',
            'inscricao' => 'inscricao',
            'url' => 'url',
            'email' => 'email',
            'telefone' => 'telefone',
            'logo' => 'logo',
            'status' => 'ATIVA'
        ]);

        AnoAgricula::create([
            "nome" => "AnoTeste Novo",
            "data_abertura" => "2023-01-05",
            "data_fechamento" => "2023-01-05",
            "status" => "ATIVO"
        ]);
    }
}
