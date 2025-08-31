<?php namespace App\Models;

use CodeIgniter\Model;

class ConfigPageModel extends Model
{
    protected $table = 'configPage';

    protected $allowedFields = ['labelConfig','typeConfig','valueConfig'];

    public function getConfig($condicao = ['typeConfig <>', 'oculto'])
    {
        return $this->where($condicao[0], $condicao[1])->findAll();
    }
    public function config($param)
    {
        return $this->like('labelConfig', $param)->findAll();
    }
    public function editConfigPage($labelConfig,$data)
    {
       return $this->where('labelConfig', $labelConfig)->set($data)->update();
    }
}