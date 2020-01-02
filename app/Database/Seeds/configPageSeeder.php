<?php namespace App\Database\Seeds;

class configPageSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
             'label'=>'Cor cabeçalho:',
             'labelConfig'=>'--color-header',
             'valueConfig'=>'#ffffff',
             'typeConfig'=>'color'
            ],
            [
              'label'=>'Cor principal:',
              'labelConfig'=>'--color-banner',
              'valueConfig'=>'#1A628A',
              'typeConfig'=>'color'
            ],
            [
              'label'=>'Cor de texto primario:',
              'labelConfig'=>'--color-font-1',
              'valueConfig'=>'#000000',
              'typeConfig'=>'color'
            ],
            [
             'label'=>'Cor de texto secundário:',
             'labelConfig'=>'--color-font-2',
             'valueConfig'=>'#ffffff',
             'typeConfig'=>'color'
            ],
            [
            'label'=>'Tamanho Logo tipo:',
            'labelConfig'=>'--tamanho-logo',
            'valueConfig'=>'12rem',
            'typeConfig'=>'tamanho'
            ],
            [
             'label'=>'Email de contato:',
             'labelConfig'=>'emailEnvio',
             'valueConfig'=>'contato@pradosolucoesdigitais',
             'typeConfig'=>'text'
            ],
            [
            'label'=>'ID Api mailchimp:',
            'labelConfig'=>'mailchimpApi',
            'valueConfig'=>'b52b69c726ee15f486b29e4f4bf4235d-us4',
            'typeConfig'=>'text'
            ],
            [
            'label'=>'Cor de fundo site:',
            'labelConfig'=>'--cor-fundo',
            'valueConfig'=>'#f8f8f8',
            'typeConfig'=>'color'
            ],
            [
            'label'=>'Cor de texto container:',
            'labelConfig'=>'--color-titulo',
            'valueConfig'=>'#1A628A',
            'typeConfig'=>'color'
            ],
            [
            'label'=>'Fonte principal do site:',
            'labelConfig'=>'--font-size',
            'valueConfig'=>'Arial',
            'typeConfig'=>'tamanho'
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