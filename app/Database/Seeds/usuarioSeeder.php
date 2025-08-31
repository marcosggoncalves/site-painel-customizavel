<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $usuarios = [
            [
                "usuario" => "marcos.ggoncalves",
                "senha"   => md5("99510796"),
                "email"   => "marcos.ggoncalves.pr@gmail.com",
                "setor" => "Desenvolvimento"
            ]
        ];

        $this->db->table('usuarios')->insertBatch($usuarios);
    }
}
