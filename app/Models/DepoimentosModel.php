<?php namespace App\Models;

use CodeIgniter\Model;

class DepoimentosModel extends Model
{
	protected $table = 'depoimentos';
    protected $allowedFields = ['descricao_depoimento', 'cliente_depoimento'];

    public function getDepoimentos()
    {
        $this->orderBy('id_depoimento', 'DESC');
        return $this->findAll();
    }
    public function newDepoimento($Depoimento)
    {
        return $this->save($Depoimento);
    }
    public function deleteDepoimento($id)
    {   
        $this->where('id_depoimento',$id);
        return $this->delete();
    }
    public function getDepoimento($id)
    {
        return $this->where('id_depoimento', $id)->findAll();
    }
    public function editDepoimento($id,$data)
    {
       return $this->where('id_Depoimento',$id)->set($data)->update();
    }
}