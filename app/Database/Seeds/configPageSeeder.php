<?php namespace App\Database\Seeds;

class configPageSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
             'label'=>'Imagem de fundo do container depoimentos:',
             'labelConfig'=>'--fundo-depoimentos',
             'valueConfig'=>'url(https://images.pexels.com/photos/139387/pexels-photo-139387.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940) no-repeat center center',
             'typeConfig'=>'text'
            ],
            [
            'label'=>'Imagem de fundo do banner:',
            'labelConfig'=>'--fundo-banner',
            'valueConfig'=>'url(https://images.pexels.com/photos/186461/pexels-photo-186461.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940) no-repeat center center',
            'typeConfig'=>'text'
            ],
             [
              'label'=>'Cor principal:',
              'labelConfig'=>'--color-banner',
              'valueConfig'=>'#1A628A',
              'typeConfig'=>'color'
            ],
            [
            'label'=>'Cor de fundo do formulário de contato:',
            'labelConfig'=>'--color-contato',
            'valueConfig'=>'#1A628A',
            'typeConfig'=>'color'
            ],
            [
            'label'=>'Cor de texto do formulário de contato:',
            'labelConfig'=>'--color-contato-font',
            'valueConfig'=>'#fff',
            'typeConfig'=>'color'
            ],
            [
            'label'=>'Tamanho Logotipo:',
            'labelConfig'=>'--tamanho-logo',
            'valueConfig'=>'9rem',
            'typeConfig'=>'tamanho'
            ],
            [
             'label'=>'Email de contato:',
             'labelConfig'=>'emailEnvio',
             'valueConfig'=>'contato@pradosolucoesdigitais.com.br',
             'typeConfig'=>'text'
            ]
        ];

        for ($i=0; $i < count($data); $i++) { 
            $this->db->query("INSERT INTO configPage (label, labelConfig, valueConfig, typeConfig) VALUES(:label:, :labelConfig:, :valueConfig:, :typeConfig:)",
                $data[$i]
            );
        }
        
        $this->db->table('configPage')->insert($data);
    }
}