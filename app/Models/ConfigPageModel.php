<?php namespace App\Models;

use CodeIgniter\Model;

class ConfigPageModel extends Model
{
    protected $table = 'configPage';

    protected $allowedFields = ['labelConfig','typeConfig','valueConfig'];

    public function getConfig()
    {
        return $this->findAll();
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