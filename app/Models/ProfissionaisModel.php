<?php namespace App\Models;

use CodeIgniter\Model;

class ProfissionaisModel extends Model
{
    protected $table = 'profissionais';
    protected $allowedFields = ['nome_profissional','sobre_profissional','curriculo_profissional'];
	
	public function getProfissionais()
    {
        return $this->findAll();
    }
    public function newProfissional($profissional)
    {
        return $this->save($profissional);
    }
    public function deleteProfissional($id)
    {   
        $this->where('id_profissionais',$id);
        return $this->delete();
    }
    public function getProfissional($id)
    {
        return $this->where('id_profissionais', $id)->findAll();
    }
    public function editProfissional($id,$data)
    {
       return $this->where('id_profissionais',$id)->set($data)->update();
    }
    public function getProfissionalLike($param)
    {
        return $this->where('nome_profissional', $param)->from($table)->findAll();
    }
}