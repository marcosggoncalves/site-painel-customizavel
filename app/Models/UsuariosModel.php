<?php namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'usuarios';
    protected $allowedFields = ['usuario', 'email', 'senha'];
	
	public function getUsuarios()
    {
        $this->orderBy('id_usuario', 'DESC');
        return $this->findAll();
    }
    public function newUsuario($Usuario)
    {
        return $this->save($Usuario);
    }
    public function deleteUsuario($id)
    {   
        $this->where('id_usuario',$id);
        return $this->delete();
    }
    public function getUsuario($id)
    {
        return $this->where('id_usuario', $id)->findAll();
    }
    public function editUsuario($id,$data)
    {
       return $this->where('id_usuario',$id)->set($data)->update();
    }
    public function usuarioEntrar($find)
    {
        $this->where($find);
        return $this->findAll();
    }
}