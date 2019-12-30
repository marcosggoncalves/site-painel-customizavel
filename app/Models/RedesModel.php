<?php namespace App\Models;

use CodeIgniter\Model;

class RedesModel extends Model
{
    protected $table = 'redessociais';
    protected $allowedFields = ['link_social','nome_social','icone_social'];

    public function getRedesSocias()
    {
        return $this->findAll();
    }
    public function editRede($id,$data)
    {
       return $this->where('id_rede_social',$id)->set($data)->update();
    }
    public function newRede($rede)
    {
        return $this->save($rede);
    }
    public function deleteRede($id)
    {   
        $this->where('id_rede_social',$id);
        return $this->delete();
    }
}