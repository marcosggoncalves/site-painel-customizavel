<?php namespace App\Models;

use CodeIgniter\Model;

class PortfolioModel extends Model
{
    protected $table = 'portifolio';
    protected $allowedFields = ['titulo_portifolio','sobre_portifolio','img_portifolio','id_profissional_port'];
	
	public function getPortfolios()
    {
        return $this->findAll();
    }
    public function newPortfolio($portfolio)
    {
        return $this->save($portfolio);
    }
    public function deletePortfolio($id)
    {   
        $this->where('id_portifolio',$id);
        return $this->delete();
    }
    public function getPortfolio($id)
    {
        return $this->where('id_portifolio', $id)->findAll();
    }
    public function editPortfolio($id,$data)
    {
       return $this->where('id_portifolio',$id)->set($data)->update();
    }
    public function getPortfolioProfissional($param)
    {
        return $this->where('id_profissional_port',$param)->findAll();
    }
}