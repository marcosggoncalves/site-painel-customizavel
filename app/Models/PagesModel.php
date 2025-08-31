<?php namespace App\Models;

use CodeIgniter\Model;

class PagesModel extends Model
{
    protected $table = 'pages';
    protected $allowedFields = ['title_page','desc_page','img_page'];

    public function getPages($param)
    {
        return $this->like('page', $param)->findAll();
    }
    public function pages()
    {
        return $this->findAll();
    }
    public function editPage($id,$data)
    {
       return $this->where('id_page',$id)->set($data)->update();
    }
}