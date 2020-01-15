<?php namespace App\Models;

use CodeIgniter\Model;

class ServicosModel extends Model
{
    protected $table = 'servicos';
    protected $allowedFields = ['descricao_servico', 'titulo_servico','icon_servico'];

    public function getServicos()
    {
        $this->orderBy('id_servico', 'DESC');
        return $this->findAll();
    }
    public function newServico($servico)
    {
        return $this->save($servico);
    }
    public function deleteServico($id)
    {   
        $this->where('id_servico',$id);
        return $this->delete();
    }
    public function getServico($id)
    {
        return $this->where('id_servico', $id)->findAll();
    }
    public function editServico($id,$data)
    {
       return $this->where('id_servico',$id)->set($data)->update();
    }
}