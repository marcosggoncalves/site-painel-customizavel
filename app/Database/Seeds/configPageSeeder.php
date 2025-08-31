<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ConfigPageSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'label'       => 'Cor principal:',
                'labelConfig' => '--color-banner',
                'valueConfig' => '#1A628A',
                'typeConfig'  => 'color'
            ],
            [
                'label'       => 'Cor de fundo do formulário de contato:',
                'labelConfig' => '--color-contato',
                'valueConfig' => '#1A628A',
                'typeConfig'  => 'color'
            ],
            [
                'label'       => 'Cor de texto do formulário de contato:',
                'labelConfig' => '--color-contato-font',
                'valueConfig' => '#fff',
                'typeConfig'  => 'color'
            ],
            [
                'label'       => 'Tamanho Logotipo:',
                'labelConfig' => '--tamanho-logo',
                'valueConfig' => '4rem',
                'typeConfig'  => 'text'
            ],
            [
                'label'       => 'Email de contato:',
                'labelConfig' => 'emailEnvio',
                'valueConfig' => 'contato@pradosolucoesdigitais.com.br',
                'typeConfig'  => 'text'
            ],
            [
                'label'=>'Fonte:',
                'labelConfig'=>'--fonte',
                'valueConfig'=>'Roboto',
                'typeConfig'=>'text'
            ],
        ];

        $this->db->table('configPage')->insertBatch($data);
    }
}
