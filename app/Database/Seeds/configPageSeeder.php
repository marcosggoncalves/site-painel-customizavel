<?php namespace App\Database\Seeds;

class configPageSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
             'label'=>'Imagem de fundo do container contato:',
             'labelConfig'=>'--fundo-contato',
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
            'label'=>'Tamanho Logo tipo:',
            'labelConfig'=>'--tamanho-logo',
            'valueConfig'=>'9rem',
            'typeConfig'=>'tamanho'
            ],
            [
             'label'=>'Email de contato:',
             'labelConfig'=>'emailEnvio',
             'valueConfig'=>'contato@pradosolucoesdigitais',
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