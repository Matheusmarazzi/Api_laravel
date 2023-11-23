<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
            Users::create([
                'nome'=>'matheus',
                'email'=>'matheus@email',
                'cpf'=>'123456789',
                'Datanascimento'=>'2023-11-01',
                'senha'=>'12345'
            ]);
    }
}
